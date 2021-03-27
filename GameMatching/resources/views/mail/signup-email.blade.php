初めまして {{ $email_data['name'] }}様
<br><br>
GameChingへようこそ
<br>
以下のリンクをクリックし、メールアドレスが有効になっていることを確認させてください。
<br><br>
<a href="http://127.0.0.1:8000/verify?code={{ $email_data['verification_code'] }}">Click Here!</a>

<br><br>
ありがとうございます。
<br>
 Game Matching