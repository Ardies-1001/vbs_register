' Déclaration des variables
Dim  connection, query , ShellObj

Dim Password, Nom, Prenom, Email, Pseudo

On Error Resume Next
choice = msgbox("Bonjour ! Veuillez ajouter un utilisateur a la DB. Pouvions-nous continuer ?",4+64+4096,"Inscription")
'Si l'utilisateur appuis sur OUI
'Yes -> 6, No -> 7, Cancel -> 2
If choice = 6 Then

'Delais d'attente
wscript.sleep 500
Do
 Nom = (InputBox ("Entrer le nom", "Inscription"))
 If Nom = "" Then Exit Do
Loop While Len(Nom) < 3
If Nom = "" Then
WScript.Quit
End If

wscript.sleep 500
Do
Prenom = (InputBox ("Entrer le prenom", "Inscription"))
 If Prenom = "" Then Exit Do
Loop While Len(Prenom) < 3
If Prenom = "" Then
WScript.Quit
End If

wscript.sleep 500
Do
Pseudo = (InputBox ("Entrer le pseudo", "Inscription"))
 If Pseudo = "" Then Exit Do
Loop While Len(Pseudo) < 3
If Pseudo = "" Then
WScript.Quit
End If

wscript.sleep 500
Do
Email = (InputBox ("Entrer l'email", "Inscription"))
 If Email = "" Then Exit Do
Loop While Len(Email) < 3
If Email = "" Then
WScript.Quit
End If

wscript.sleep 500
Do
 Password = (InputBox ("Entrer le mot de passe", "Inscription"))
 If Password = "" Then Exit Do
Loop While Len(Password) < 3
If Password = "" Then
WScript.Quit
End If


' set objShell = createobject("WScript.Shell")
' PasswordHash = objShell.Run("echo -n """ & Password & """ | openssl sha1", 0, True)


' Méthode Avec Connecteur ODBC , j'essaie de :

' ' Établissement de la connexion à la base de données
' set connection = CreateObject("ADODB.Connection")
' connection.Open "DRIVER={MySQL ODBC 8.0 Driver}; SERVER=127.0.0.1; DATABASE=vbs_register; UID=root; PWD=''"

' ' Construction de la requête SQL
' query = "INSERT INTO users ( nom, prenom, pseudo, email, password) VALUES ('"& nom &"','"& prenom &"','"& pseudo &"','"& email &"','"& password &"')"

' ' Exécution de la requête
' connection.Execute query

' ' Fermeture de la connexion
' connection.Close
' Set connection = Nothing

Set ShellObj = CreateObject("WScript.Shell")
ShellObj.Run "cmd"
WScript.Sleep 500
ShellObj.SendKeys "C:\xampp\mysql\bin\mysql.exe -u root --password=  -e ""INSERT INTO vbs_register.users {(} nom, prenom, pseudo, email, password{)} VALUES {(}'"& Nom &"','"& Prenom &"','"& Pseudo &"','"& Email &"','"& Password &"'{)}"" {enter}exit{enter}"

Set ShellObj = nothing

wscript.sleep 500
msg02 = msgbox("Merci !",0+64+4096,"Inscription")
End If
If choice = 7 Then
msg03 = msgbox("Quittez ?.",0+64+4096,"Inscription")
End If