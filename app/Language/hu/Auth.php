<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

return [
    // Exceptions
    'unknownAuthenticator'  => '{0} érvénytelen.',
    'unknownUserProvider'   => 'Ismeretlen kiszolgáló.',
    'invalidUser'           => 'A megadott felhasználó nem létezik.',
    'bannedUser'            => 'Jelenleg nem engedélyezett a belépés az Ön számára.',
    'logOutBannedUser'      => 'Kitiltás miatt ki lesz léptetve.',
    'badAttempt'            => 'Sikertelen belépés. Ellenőrizze a jelszót.',
    'noPassword'            => 'Jelszó nélkül nem lehet belépni.',
    'invalidPassword'       => 'Sikertelen belépés. Ellenőrizze a jelszót.',
    'noToken'               => 'Mindegyik kérésnek tartalmaznia kell a toknet a {0} fejlécben.',
    'badToken'              => 'Érvénytelen token.',
    'oldToken'              => 'A token lejárt.',
    'noUserEntity'          => 'User Entity must be provided for password validation.',
    'invalidEmail'          => 'Érvénytelen email cím.',
    'unableSendEmailToUser' => 'Sorry, there was a problem sending the email. We could not send an email to "{0}".',
    'throttled'             => 'Too many requests made from this IP address. You may try again in {0} seconds.',
    'notEnoughPrivilege'    => 'You do not have the necessary permission to perform the desired operation.',
    'errorInvalidEducationalId' => 'Az oktatási azonosító érvénytelen. Az oktatási azonosító 11 számjegyből állhat, és a 7 számjeggyel kezdődik.',
    // JWT Exceptions
    'invalidJWT'     => 'The token is invalid.',
    'expiredJWT'     => 'The token has expired.',
    'beforeValidJWT' => 'The token is not yet available.',

    'email'           => 'Email cím',
    'username'        => 'Felhasználónév',
    'fullname'        => 'Teljes név',
    'educationalId'   => 'Oktatási azonosító',
    'password'        => 'Jelszó',
    'passwordConfirm' => 'Jelszó (ismét)',
    'haveAccount'     => 'Van már hozzáférése?',
    'token'           => 'Token',

    // Buttons
    'confirm' => 'Megerősítés',
    'send'    => 'Küldés',

    // Registration
    'register'         => 'Regisztráció',
    'registerDisabled' => 'Regisztráció jelenleg nem lehetséges.',
    'registerSuccess'  => 'Üdvözöljük!',

    // Login
    'login'              => 'Belépés',
    'needAccount'        => 'Hozzáférésre van szüksége?',
    'rememberMe'         => 'Emlékezz rám',
    'forgotPassword'     => 'Elfelejtette a jelszavát?',
    'useMagicLink'       => 'Helyreállítási link küldése',
    'magicLinkSubject'   => 'A bejelentkezési linkje.',
    'magicTokenNotFound' => 'Nem sikerült ellenőrizni a linket.',
    'magicLinkExpired'   => 'Sajnáljuk, a link lejárt.',
    'checkYourEmail'     => 'Ellenőrizze az email címet!',
    'magicLinkDetails'   => 'Elküldtük a bejelentkezési linket az email címére. A link {0} percig érvényes.',
    'magicLinkDisabled'  => 'A MagicLink használata jelnleg nem lehtséges.',
    'successLogout'      => 'Sikeresen kilépett.',
    'backToLogin'        => 'Vissza a bejelentkezéshez',

    // Passwords
    'errorPasswordLength'       => 'A jelszónak legalább {0, number} karakter hosszúnak kell lennie.',
    'suggestPasswordLength'     => 'A jelszó (maximum 255 karakter hosszú) legyen biztonságos és megjegyezhető.',
    'errorPasswordCommon'       => 'A jelszó túl általános.',
    'suggestPasswordCommon'     => 'A jelszó a 65 ezer legkönnyebben feltörhető jelszó között van.',
    'errorPasswordPersonal'     => 'A jelszó nem tartalmazhat személyes adatokat.',
    'suggestPasswordPersonal'   => 'Az email címet vagy a felhasználó nevet ne használja a jelszóban.',
    'errorPasswordTooSimilar'   => 'A jelszó túlságosan hasonló a felhasználó névhez.',
    'suggestPasswordTooSimilar' => 'Az email címet vagy a felhasználó nevet ne használja a jelszóban.',
    'errorPasswordPwned'        => 'The password {0} has been exposed due to a data breach and has been seen {1, number} times in {2} of compromised passwords.',
    'suggestPasswordPwned'      => '{0}-t soha ne használja jelszóként, mert nagyon könnyen feltörhető.',
    'errorPasswordEmpty'        => 'Kötelező a jelszót megadni.',
    'errorPasswordTooLongBytes' => 'A jelszó legfeljebb {param} byte hosszú lehet.',
    'passwordChangeSuccess'     => 'A jelszó módosítása sikeres.',
    'userDoesNotExist'          => 'A jelszó nem változott. A felhasználó nem létezik.',
    'resetTokenExpired'         => 'Sajnáljuk, a jelszó visszaállítási token lejárt.',

    // Email Globals
    'emailInfo'      => 'Néhány információ a személyről:',
    'emailIpAddress' => 'IP cím:',
    'emailDevice'    => 'Eszköz:',
    'emailDate'      => 'Dátum:',

    // 2FA
    'email2FATitle'       => 'Two Factor Authentication',
    'confirmEmailAddress' => 'Confirm your email address.',
    'emailEnterCode'      => 'Confirm your Email',
    'emailConfirmCode'    => 'Enter the 6-digit code we just sent to your email address.',
    'email2FASubject'     => 'Your authentication code',
    'email2FAMailBody'    => 'Your authentication code is:',
    'invalid2FAToken'     => 'The code was incorrect.',
    'need2FA'             => 'You must complete a two-factor verification.',
    'needVerification'    => 'Check your email to complete account activation.',

    // Activate
    'emailActivateTitle'    => 'Email Activation',
    'emailActivateBody'     => 'We just sent an email to you with a code to confirm your email address. Copy that code and paste it below.',
    'emailActivateSubject'  => 'Your activation code',
    'emailActivateMailBody' => 'Please use the code below to activate your account and start using the site.',
    'invalidActivateToken'  => 'The code was incorrect.',
    'needActivate'          => 'You must complete your registration by confirming the code sent to your email address.',
    'activationBlocked'     => 'You must activate your account before logging in.',

    // Groups
    'unknownGroup' => '{0} is not a valid group.',
    'missingTitle' => 'Groups must have a title.',

    // Permissions
    'unknownPermission' => '{0} is not a valid permission.',
];
