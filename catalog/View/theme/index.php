
    <?php $this->theme->builder('header') ?>

    <section class="intro">
        <div class="container">
            <div class="intro__body">
                <form class="form-signin" role="form" data-form>
                    <h2 class="form-signin-heading intro__title">Регистрация нового пользователя</h2>
                    <p>* поля обязательные к заполнению</p>
                    <input type="text" id="formFirstname" name="firstname" class="form-control mb-3" placeholder="Firstname:">
                    <input type="text" id="formLastname" name="lastname" class="form-control mb-3" placeholder="Lastname:">
                    <input type="email" id="formEmail" name="email" class="form-control mb-3" placeholder="* Email:" required autofocus>
                    <input type="password" id="formPassword" name="password" class="form-control mb-3" placeholder="* Password" required>
                    <input type="password" id="formRepeatPassword" name="repeatPassword" class="form-control mb-3" placeholder="* Repeat password:" required>
                    <button style="background: blue;" class="btn btn-lg btn-primary btn-block" type="submit" data-modal>Регистрация</button>
                </form>
            </div>
            
        </div> <!-- /container -->
    </section>


    <div class="result" data-result>
        <div class="result__dialog">

            <button class="result__close" type="button" data-close>
                <img src="/catalog/View/theme/img/close_icon.svg" alt="close">
            </button>          

        </div> 
    </div> <!-- /modal -->

    <?php $this->theme->builder('footer') ?>
