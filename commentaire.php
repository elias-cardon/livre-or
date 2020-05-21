<meta charset="utf-8" />
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=livreor','root','');
$requete_uti = "SELECT id FROM utilisateurs WHERE login ='" .$_SESSION['login']. "'";
$requete_comm = $bdd->prepare($requete_uti);
$requete_comm->execute();
$utilisateurs = $requete_comm->fetch(PDO::FETCH_ASSOC);
if ($_SESSION['login']) {
  if(isset($_POST['commentaire']))
   {
       $commentaire = htmlspecialchars($_POST['commentaire']);

       $insert = $bdd->prepare('INSERT INTO commentaire(id_utilisateur, commentaire, date) VALUES (:id, :commentaire, CURTIME())');
       $insert->execute(array(
        "id"=>$utilisateurs['id'],
           "commentaire" => $commentaire
       ));
   }
}

?>
<nav><a href="index.php">Accueil</a> | <a href="profil.php">Profil</a> | <a href="livreor.php">Livre d'or</a>  <br/> <a href='logout.php'>Se déconnecter</a></p></a></nav>
<h2>Commentaires:</h2>
<form action="commentaire.php" method="POST">

   <textarea class="input" name="commentaire" placeholder="Votre commentaire..."></textarea><br />
   <input class="input" type="submit" value="Poster mon commentaire" name="submit_commentaire" />

</form>

<?php
echo '<style>
h2
{
  text-align : center;
  font-family: "Source Sans Pro", Helvetica, sans-serif;
  text-decoration : underline;
}
p
{
  text-align : center;
  font-family: "Source Sans Pro", Helvetica, sans-serif;
  font-size: 16pt;
  font-weight: 400;
  line-height: 1.75em;
  color : black;
}

.input
{
  display:block;
  margin:auto;
}


form
{
  border : 4mm ridge rgba(170, 50, 220, .6);
}
</style>';
?>

 <!-- CSS -->
            <style>

@import url("fontawesome-all.min.css");
@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic");



html, body, div, span, applet, object,
iframe, h1, h2, h3, h4, h5, h6, p, blockquote,
pre, a, abbr, acronym, address, big, cite,
code, del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var, b,
u, i, center, dl, dt, dd, ol, ul, li, fieldset,
form, label, legend, table, caption, tbody,
tfoot, thead, tr, th, td, article, aside,
canvas, details, embed, figure, figcaption,
footer, header, hgroup, menu, nav, output, ruby,
section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;}

article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
  display: block;}

body {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

body {
  -webkit-text-size-adjust: none;
}

input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

input, select, textarea {
  -moz-appearance: none;
  -webkit-appearance: none;
  -ms-appearance: none;
  appearance: none;
}

/* Basic */

  html {
    box-sizing: border-box;
  }

  *, *:before, *:after {
    box-sizing: inherit;
  }

  body {
    background: #fff;
  }

    body.is-preload *, body.is-preload *:before, body.is-preload *:after {
      -moz-animation: none !important;
      -webkit-animation: none !important;
      -ms-animation: none !important;
      animation: none !important;
      -moz-transition: none !important;
      -webkit-transition: none !important;
      -ms-transition: none !important;
      transition: none !important;
    }

  body, input, select, textarea {
    color: #a2a2a2;
    font-family: "Source Sans Pro", Helvetica, sans-serif;
    font-size: 16pt;
    font-weight: 400;
    line-height: 1.75em;
  }

  a {
    -moz-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -webkit-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    -ms-transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out;
    border-bottom: dotted 1px;
    color: #49bf9d;
    text-decoration: none;
  }

    a:hover {
      border-bottom-color: transparent;
      color: #49bf9d !important;
      text-decoration: none;
    }

  strong, b {
    color: #787878;
    font-weight: 400;
  }

  em, i {
    font-style: italic;
  }

  p {
    margin: 0 0 2em 0;
  }

  h1, h2, h3, h4, h5, h6 {
    color: #787878;
    font-weight: 400;
    line-height: 1em;
    margin: 0 0 1em 0;
  }

    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
      color: inherit;
      text-decoration: none;
    }

  h1 {
    font-size: 2em;
    line-height: 1.5em;
  }

  h2 {
    font-size: 1.5em;
    line-height: 1.5em;
  }

  h3 {
    font-size: 1.25em;
    line-height: 1.5em;
  }

  h4 {
    font-size: 1.1em;
    line-height: 1.5em;
  }

  h5 {
    font-size: 0.9em;
    line-height: 1.5em;
  }

  h6 {
    font-size: 0.7em;
    line-height: 1.5em;
  }

    
    

    
    

    


  



/* Icon */

  .icon {
    text-decoration: none;
    border-bottom: none;
    position: relative;
  }

    .icon:before {
      -moz-osx-font-smoothing: grayscale;
      -webkit-font-smoothing: antialiased;
      display: inline-block;
      font-style: normal;
      font-variant: normal;
      text-rendering: auto;
      line-height: 1;
      text-transform: none !important;
      font-family: 'Font Awesome 5 Free';
      font-weight: 400;
    }

    .icon > .label {
      display: none;
    }

    .icon:before {
      line-height: inherit;
    }

    .icon.solid:before {
      font-weight: 900;
    }

    .icon.brands:before {
      font-family: 'Font Awesome 5 Brands';
    }

/* Image */

  .image {
    border-radius: 0.35em;
    border: 0;
    display: inline-block;
    position: relative;
  }

    .image:before {
      -moz-transition: opacity 0.2s ease-in-out;
      -webkit-transition: opacity 0.2s ease-in-out;
      -ms-transition: opacity 0.2s ease-in-out;
      transition: opacity 0.2s ease-in-out;
      background: url("images/overlay.png");
      border-radius: 0.35em;
      content: '';
      display: block;
      height: 100%;
      left: 0;
      opacity: 0.5;
      position: absolute;
      top: 0;
      width: 100%;
    }

    .image.thumb {
      text-align: center;
    }

      .image.thumb:after {
        -moz-transition: opacity 0.2s ease-in-out;
        -webkit-transition: opacity 0.2s ease-in-out;
        -ms-transition: opacity 0.2s ease-in-out;
        transition: opacity 0.2s ease-in-out;
        border-radius: 0.35em;
        border: solid 3px rgba(255, 255, 255, 0.5);
        color: #fff;
        content: 'View';
        display: inline-block;
        font-size: 0.8em;
        font-weight: 400;
        left: 50%;
        line-height: 2.25em;
        margin: -1.25em 0 0 -3em;
        opacity: 0;
        padding: 0 1.5em;
        position: absolute;
        text-align: center;
        text-decoration: none;
        top: 50%;
        white-space: nowrap;
      }

      .image.thumb:hover:after {
        opacity: 1.0;
      }

      .image.thumb:hover:before {
        background: url("images/overlay.png"), url("images/overlay.png");
        opacity: 1.0;
      }

    .image img {
      border-radius: 0.35em;
      display: block;
    }

    .image.left {
      float: left;
      margin: 0 1.5em 1em 0;
      top: 0.25em;
    }

    .image.right {
      float: right;
      margin: 0 0 1em 1.5em;
      top: 0.25em;
    }

    .image.left, .image.right {
      max-width: 40%;
    }

      .image.left img, .image.right img {
        width: 100%;
      }

    .image.fit {
      display: block;
      margin: 0 0 2em 0;
      width: 100%;
    }

      .image.fit img {
        width: 100%;
      }

    .image.avatar {
      border-radius: 100%;
    }

      .image.avatar:before {
        display: none;
      }

      .image.avatar img {
        border-radius: 100%;
        width: 100%;
      }



/* Icons */

  ul.icons {
    cursor: default;
    list-style: none;
    padding-left: 0;
  }

    ul.icons li {
      display: inline-block;
      padding: 0 1em 0 0;
    }

      ul.icons li:last-child {
        padding-right: 0;
      }

      ul.icons li .icon:before {
        font-size: 1.5em;
      }

/* Labeled Icons */

  ul.labeled-icons {
    list-style: none;
    padding: 0;
  }

    ul.labeled-icons li {
      line-height: 1.75em;
      margin: 1.5em 0 0 0;
      padding-left: 2.25em;
      position: relative;
    }

      ul.labeled-icons li:first-child {
        margin-top: 0;
      }

      ul.labeled-icons li a {
        color: inherit;
      }

      ul.labeled-icons li h3 {
        color: #b2b2b2;
        left: 0;
        position: absolute;
        text-align: center;
        top: 0;
        width: 1em;
      }

/* Actions */

  ul.actions {
    display: -moz-flex;
    display: -webkit-flex;
    display: -ms-flex;
    display: flex;
    cursor: default;
    list-style: none;
    margin-left: -1em;
    padding-left: 0;
  }

    ul.actions li {
      padding: 0 0 0 1em;
      vertical-align: middle;
    }

    ul.actions.special {
      -moz-justify-content: center;
      -webkit-justify-content: center;
      -ms-justify-content: center;
      justify-content: center;
      width: 100%;
      margin-left: 0;
    }

      ul.actions.special li:first-child {
        padding-left: 0;
      }

    ul.actions.stacked {
      -moz-flex-direction: column;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      margin-left: 0;
    }

      ul.actions.stacked li {
        padding: 1.3em 0 0 0;
      }

        ul.actions.stacked li:first-child {
          padding-top: 0;
        }

    ul.actions.fit {
      width: calc(100% + 1em);
    }

      ul.actions.fit li {
        -moz-flex-grow: 1;
        -webkit-flex-grow: 1;
        -ms-flex-grow: 1;
        flex-grow: 1;
        -moz-flex-shrink: 1;
        -webkit-flex-shrink: 1;
        -ms-flex-shrink: 1;
        flex-shrink: 1;
        width: 100%;
      }

        ul.actions.fit li > * {
          width: 100%;
        }

      ul.actions.fit.stacked {
        width: 100%;
      }

    @media screen and (max-width: 480px) {

      ul.actions:not(.fixed) {
        -moz-flex-direction: column;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-left: 0;
        width: 100% !important;
      }

        ul.actions:not(.fixed) li {
          -moz-flex-grow: 1;
          -webkit-flex-grow: 1;
          -ms-flex-grow: 1;
          flex-grow: 1;
          -moz-flex-shrink: 1;
          -webkit-flex-shrink: 1;
          -ms-flex-shrink: 1;
          flex-shrink: 1;
          padding: 1em 0 0 0;
          text-align: center;
          width: 100%;
        }

          ul.actions:not(.fixed) li > * {
            width: 100%;
          }

          ul.actions:not(.fixed) li:first-child {
            padding-top: 0;
          }

          ul.actions:not(.fixed) li input[type="submit"],
          ul.actions:not(.fixed) li input[type="reset"],
          ul.actions:not(.fixed) li input[type="button"],
          ul.actions:not(.fixed) li button,
          ul.actions:not(.fixed) li .button {
            width: 100%;
          }

            ul.actions:not(.fixed) li input[type="submit"].icon:before,
            ul.actions:not(.fixed) li input[type="reset"].icon:before,
            ul.actions:not(.fixed) li input[type="button"].icon:before,
            ul.actions:not(.fixed) li button.icon:before,
            ul.actions:not(.fixed) li .button.icon:before {
              margin-left: -0.5em;
            }

    }







/* Header */
#lien
{
  padding-bottom: 6.5rem;
}

/* Footer */

  #footer .icons {
    margin: 1em 0 0 0;
  }

    #footer .icons a {
      color: rgba(255, 255, 255, 0.4);
    }

  

/* Main */

  #main {
    margin-left: 35%;
    max-width: 54em;
    padding: 8em 4em 4em 4em;
    width: calc(100% - 35%);
  }

    #main > section {
      border-top: solid 2px #efefef;
      margin: 4em 0 0 0;
      padding: 4em 0 0 0;
    }

      #main > section:first-child {
        border-top: 0;
        margin-top: 0;
        padding-top: 0;
      }





/* XLarge */

  @media screen and (max-width: 1800px) {

    /* Basic */

      body, input, select, textarea {
        font-size: 12pt;
      }

  }

/* Large */

  @media screen and (max-width: 1280px) {

    /* Header */

      #header {
        padding: 6em 3em 3em 3em;
        width: 30%;
      }

        #header h1 {
          font-size: 1.25em;
        }

          #header h1 br {
            display: none;
          }

        #header > .inner {
          margin-bottom: 0;
        }

        </style>