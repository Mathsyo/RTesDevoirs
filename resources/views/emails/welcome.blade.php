@component('mail::message')

# Salut!

je suis Mathias DE BARROS.
T'as sûrement discuté avec moi depuis le début de l'année mais si c'est pas le cas, 
n'hésite pas à venir me parler de tout ce que tu veux, c'est avec plaisir !

# Enfin bref, c'est pas le sujet.
J'ai remarqué que la prise de devoirs dans son agenda depuis le début de l'année était compliquée, 
alors j'ai décidé de développer une application web pour pouvoir noter les devoir de façon collaborative.

# Le principe est plutôt simple :
- Dès que le prof annonce un  devoir ou un DS (par mail ou en classe), il suffit de le noter en cliquant sur "Nouveau devoir" et de remplir les informations (Titre, Description, Pour le et le cours associé).
- Si tu essayes d'ajouter un devoir et qu'un autre devoir a la même date et le même cours associé, tu auras une demande de confirmation (pour éviter les doublons inutiles :) )
- Ensuite tu peux cocher les devoirs que tu as fait et ça n'impacte pas la vision des autres élèves
- Et d'autres fonctionnalités utiles (liste des profs, liste des cours, ...)

# Une dernière chose
Si tu peux prendre 2 minutes pour répondre à ce questionnaire pour m'aider à améliorer l'application, ça serait vraiment sympa :)
@component('mail::button', ['url' => 'https://forms.gle/gbXq534RK1sVTLED8'])
Remplir le formulaire
@endcomponent

# Voilà! Trêve de blabla, je te laisse découvrir l'application !
N'hésite pas à **enregistrer tes identifiants** quelque part et mettre **l'application en favoris** dans ton navigateur.

Tes identifiants : 
- Ton login : {{ $userDetails['login'] }}
- Ton mot de passe : {{ $userDetails['password'] }}

Et le plus important, le lien pour accéder à l'application :
@component('mail::button', ['url' => 'https://rtesdevoirs.deokonai.fr/'])
Accéder à l'application
@endcomponent

A bientôt,<br>
Mathias DE BARROS.
@endcomponent
