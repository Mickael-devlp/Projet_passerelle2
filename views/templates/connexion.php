
<section class="building">
        <div class="container_log">
            <div class="wrapper">
                <!-- Je met du php pour la bascule de co à déconnexion une fois co -->
                 <?php if (isset($_SESSION['user'])): ?>

                    <!-- Section permettant de se conencter à la déconnexion, seul hic c'est qu'il faut aller dans la page connexion, un peu chiant. 
                     Du coup dans j'ai modifié dans header pour déco direct. Je préfère laisser le code là au cas où -->
                <section class="logout page_log">
                    <h2 class="h2-connexion">Bienvenue, <?= htmlspecialchars($_SESSION['user']['pseudonyme']) ?> !</h2>
                        <form action="/MESBG/controllers/logout.php" method="POST">
                            <button type="submit" name="logout" class="button_log">Se déconnecter</button>
                        </form>
                </section>

                <!-- Si l'utilisateur n'est pas connecté, alors ça affichera se co et inscription -->
            <?php else: ?>
                <!-- 1ère section connexion-->
                <section class="login page_log">
                    <h2 class="h2-connexion">Connexion</h2>
                        <form action="/MESBG/controllers/login.php" method="POST">
                            <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <!-- On rajoute les value pour le cookie dans email et password !-->
                                <input type="email" name="email" placeholder="Email" id="email" 
                                value="<?= isset($_COOKIE['user_email']) ? htmlspecialchars($_COOKIE['user_email']) : '' ?>" required />
                            </div>
                            <div class="inputbox">
                                <ion-icon name="lock-closed"></ion-icon>
                                <input type="password" name="password" placeholder="Mot de passe" id="password" 
                                value="<?= isset($_COOKIE['user_pseudo']) ? htmlspecialchars($_COOKIE['user_pseudo']) : '' ?> "required />
                            </div>

                            <!-- Pour la création d'un cookie ! -->
                            <div class="container-checkbox">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Se souvenir de moi</label>
                            </div>
                                <!-- A créer une page avec petit formulaire pour revoyer un new mdp temporaire pour réinit la session -->
                                <div class="forgot">
                                    <a href="#" for="">Mot de passe oublié ?</a>
                                </div>


                            <!-- Message d'erreur si l'user se trompe entre l'eamil et le mdp -->
                            <?php if (isset($_GET['login_error'])): ?>
                                <div class="error-message">
                                    <?php 
                                        if ($_GET['login_error'] == 'wrong') echo "Email ou mot de passe incorrect.";
                                        if ($_GET['login_error'] == 'empty') echo "Veuillez remplir tous les champs.";
                                    ?>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="button_log" name="login">Connexion</button>

                            <!-- Pour aller sur la page d'inscription, effet réaliser grâce à JS -->
                            <div class="register_option">
                                <span>Pas de compte ?</span>
                                <a href="" id="switch_to_register">Inscrivez-vous !</a>
                            </div>
                        </form>

                </section>

                <!-- 2ème section inscription-->
                <section class="register page_log">
                    <h2 class="h2-connexion">Inscription</h2>
                        <form action="/MESBG/controllers/register.php" method="POST">
                            <div class="inputbox">
                                <ion-icon name="game-controller"></ion-icon>
                                <input type="text" name="pseudonyme" id="pseudonyme" placeholder="Pseudonyme" required />
                            </div>
                            <div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input type="email" name="email" id="email" placeholder="Email" required />
                            </div>
                            <div class="inputbox">
                                <input type="password" name="password" placeholder="Mot de passe" id="password" minlength="6" required />
                                <ion-icon name="eye-outline" id="togglePassword"></ion-icon>
                            </div>

                            <!-- Message d'erreur si l'user écrit moins de 6 caractères pour le mdp -->
                            <?php if (isset($_GET['error'])): ?>
                                <div class="error-message">
                                    <?php 
                                        if ($_GET['error'] == 'password') echo "Le mot de passe doit faire au moins 6 caractères.";
                                        if ($_GET['error'] == 'email_exists') echo "Cet email est déjà utilisé.";
                                        if ($_GET['error'] == 'empty') echo "Veuillez remplir tous les champs.";
                                    ?>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="button_log" name="register">Inscription</button>
                            
                            <div class="register_option">
                            <span>Déjà un compte ?</span>
                            <a href="" id="switch_to_login">Connectez-vous !</a>
                            </div>
                        </form>
                </section>

                <!-- Bloc conditionnel à mettre quand on met des conditions dans du HTML. Ne fait pas planter mon code. At the moment -->
                <?php endif; ?>

            </div>
    </div>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="/MESBG/public/js/log.js"></script>
        
    </section>
</body>
</html>
