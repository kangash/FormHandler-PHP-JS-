<?php 

namespace Catalog\Controller;

use Engine\Controller;


class AcсountController extends Controller
{

    public function ajaxRegistrationUser()
    {
        // Иниациализирование необходимых переменных
        $params = (object) $this->request->post;
        $model  = $this->load->model('user');
        $dataUser = $model->user->getUserData();
        $validEmail = preg_match('/@/', $params->email);
        $identicalPassword = $params->password == $params->repeatPassword;
        $noPassword = ($params->password == '') && ($params->repeatPassword == '');
        $countUser = 0;
        $status = [];
        $log    = [];

        // Запись информации о пустом поле в Log файл
        foreach ($this->request->post as $key => $value) {
            if (empty($value)) {
                $log['empty'][] = "Поле: \"$key\" не заполнена!";
            }
        }

        // Проверка валидности емайла или совпадение паролей
        if ( $validEmail && ( $identicalPassword && !$noPassword ) ) {

            $flagCheckUser = false;
            foreach ($dataUser as $object) {
                if ($params->email == $object->email) {
                    $flagCheckUser = true;
                    $countUser++;
                } 
            }
            
            if ( $countUser >= 1 ) {
                //Запись в лог файл о том, что в базе данных уже больше одного пользователя с таким емайлом.
                $log['user']['count'] = "В базе данных существует " . declination( $countUser ) . 
                                                    " с емайлом: \"$params->email\"";
            }

            if ($flagCheckUser) {
                $message =  "Такой пользователь \"$params->email\" уже существует!";
                $status['error']['user_exists'] = $message;
            } else {
                $message = "Пользователь \"$params->email\" успешно зарегестрирован!";
                $status['success'] = $message;
            }
            $log['status'] = $message;
        }

        if ( !$validEmail ) {
            $messageEmail = "Введенный email \"$params->email\" не валидный!";
            $status['error']['email'] = $messageEmail;
            $log['error']['email']    = $messageEmail;
        }

        if ( !$identicalPassword ) {
            $messagePass = "Введенные пароли не совпадают!";
            $status['error']['password'] = $messagePass;
            $log['error']['password']    = $messagePass;
        } elseif ( $noPassword ) {
            $status['error']['password'] = "Введите пожалуйста пароли!";
        }

        $this->log->setDataLogFile($log);

        return print_r( json_encode($status) );

        
    }



}