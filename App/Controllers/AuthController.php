<?php

namespace App\Controllers;

use App\Classes\Utilisateur;

class AuthController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }
    public function login(): void
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old = $_POST;
            $email = trim($_POST['email']) ?? '';
            $password = trim($_POST['password']) ?? '';

            if (!empty($email) && !empty($password)) {
                $user = Utilisateur::login($email, $password);

                if ($user !== null) {
                    $_SESSION['logged'] = $user;

                    if ($user->role == 'admin') {
                        header('Location: /MaBagnole-MVC/Admin');
                    } else {
                        header('Location: /MaBagnole-MVC/cars');
                    }
                    exit();
                } else {
                    $_SESSION['old'] = $old;
                    $_SESSION['error'] = 'Email or password are incorrect';
                    header('Location: /MaBagnole-MVC/Auth/login');
                    exit();
                }
            } elseif (empty($password)) {
                $_SESSION['empty'] = 'Email or password cannot be empty';
                $_SESSION['old'] = $old;

                header('Location: /MaBagnole-MVC/Auth/login');
                exit();
            }
        } else {
            require_once __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function register(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old = $_POST;
            $nom = trim($_POST['nom']) ?? '';
            $email = trim($_POST['email']) ?? '';
            $password = trim($_POST['password']) ?? '';

            $checkValidation = Utilisateur::validateForm($nom, $email);

            if ($checkValidation !== null) {
                $_SESSION['errors'] = $checkValidation;
                $_SESSION['old'] = $old;
                header('Location: /MaBagnole-MVC/Auth/register');
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $newUser = new Utilisateur($nom, $email, $hashedPassword);
                $newUser->signUp();
                header('Location: /MaBagnole-MVC/Auth/login');
            }
            exit();
        } else {
            require_once __DIR__ . '/../Views/auth/register.php';
        }
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /MaBagnole-MVC/Auth');
        exit();
    }
}
