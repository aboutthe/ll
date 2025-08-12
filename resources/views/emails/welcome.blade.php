<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Добро пожаловать</title>
    @livewireStyles
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; background:#f6f7f9; padding:24px;">
  <table role="presentation" width="100%%" cellpadding="0" cellspacing="0" style="max-width:640px; margin:0 auto; background:#ffffff; border-radius:12px; overflow:hidden;">
    <tr>
      <td style="padding:24px 24px 0 24px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:32px">
      </td>
    </tr>
    <tr>
      <td style="padding:24px;">
        <h1 style="margin:0 0 12px 0; font-size:24px; color:#0f172a;">Здравствуйте, {{ $user->name }}!</h1>
        <p style="margin:0 0 12px 0; color:#334155; line-height:1.6;">
          Спасибо за регистрацию. Мы рады видеть вас среди пользователей!
        </p>
        <p style="margin:0 0 24px 0; color:#334155; line-height:1.6;">
          Перейдите в личный кабинет, чтобы начать работу.
        </p>
        <p>
          <a href="{{ url('/dashboard') }}" style="display:inline-block; padding:10px 16px; background:#0f172a; color:#fff; text-decoration:none; border-radius:10px;">Перейти в кабинет</a>
        </p>
      </td>
    </tr>
    <tr>
      <td style="padding:16px 24px 24px 24px; color:#94a3b8; font-size:12px;">
        Если вы не регистрировались — просто проигнорируйте это письмо.
      </td>
    </tr>
  </table>
    @livewireScripts
</body>
</html>
