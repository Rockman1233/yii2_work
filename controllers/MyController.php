<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 29.11.17
 * Time: 16:22
 */

namespace app\controllers;
use yii\web\Controller;

class MyController extends Controller {

    public function actionIndex($text=222){

        $hi = 'Hellow world';
        return $this->render('index',compact('hi','text'));


    }

    public function actionBlogPost(){
        return 'BlogPost';
    }
}