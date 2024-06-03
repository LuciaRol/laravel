<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST'); // Lee el valor de MAIL_HOST del archivo .env
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME'); // Lee el valor de MAIL_USERNAME del archivo .env
            $mail->Password = env('MAIL_PASSWORD'); // Lee el valor de MAIL_PASSWORD del archivo .env
            $mail->Port = env('MAIL_PORT'); // Lee el valor de MAIL_PORT del archivo .env
            $mail->SMTPSecure = env('MAIL_ENCRYPTION'); // Lee el valor de MAIL_ENCRYPTION del archivo .env

            // Detalles del remitente y del destinatario
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); // Lee los valores de MAIL_FROM_ADDRESS y MAIL_FROM_NAME del archivo .env
            $mail->addAddress($request->email, $request->name);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Registro en aplicación de tatuajes';
            $mail->Body = 'Acabas de registrarte';

            // Envío del correo
            $mail->send();
        
        } catch (Exception $e) {
            
        }


        return redirect(route('dashboard', absolute: false));
    }
}
