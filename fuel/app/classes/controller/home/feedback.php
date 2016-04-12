<?php

class Controller_Home_Feedback extends Fuel\Core\Controller_Rest {
    
    public function post_create() {
        $status = 'ok';
        $errors = array();
        
        if(Model_Feedback::get_validator()->run()) {
            //$fedback = Model_Feedback::forge(Model_Feedback::get_validator()->validated());
            $fields = Model_Feedback::get_validator()->validated();
            $fedback = Model_Feedback::forge(array(
                'user_name' => strip_tags($fields['user_name']),
                'user_email' => strip_tags($fields['user_email']),
                'text' => strip_tags($fields['text']),
            ));
            $fedback->save();
            
            $email = Email::forge();
            $email->from(\Fuel\Core\Config::get('application.mail_feedback.from.adress'), \Fuel\Core\Config::get('application.mail_feedback.from.name'));
            $email->to(\Fuel\Core\Config::get('application.mail_feedback.to.adress'), \Fuel\Core\Config::get('application.mail_feedback.to.name'));
            $email->subject("Feedback added");
            $email->body("User: {$fedback->user_name}; Mail: {$fedback->user_email}; Text: {$fedback->text}");
            try {
                $email->send();
            } catch(\EmailValidationFailedException $e) {
                $status = 'EmailValidationFailed';
            } catch(\EmailSendingFailedException $e) {
                $status = 'EmailSendingFailed';
            }
            
            return $this->response(array('status' => 'ok'));
        } else {
            return $this->response(array('status' => 'fail', 'errors' => Model_Feedback::get_validator()->error()));
        }
            
        
    }
    
}

