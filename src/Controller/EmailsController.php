<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;

   class EmailsController extends AppController{
      public function index(){
         $user_uuid = $this->request->pass;
         
         $email = new Email('default');
         $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $user_uuid[2];
         $email->to($user_uuid[1])->subject('Essai de CakePHP Mailer')->send($confirmation_link);
         
         $this->Flash->success(__('A confirmation email has been sent.'));

         return $this->redirect('/users/login');
      }
   }
?>

