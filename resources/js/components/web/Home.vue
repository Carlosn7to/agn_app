<template>
    <div class="container-main-web">
        <header>

        </header>
        <main>
            <div class="card-login-web shadow-standard">
                <h1>Conecte-se com sua conta.</h1>
                <form :action="action_login" method="POST">
                    <input type="hidden" name="_token" :value="token">
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" id="email"><br><br>
                    <label for="password">Senha</label><br>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </main>
        <footer>

        </footer>
    </div>
</template>

<script>
export default {
    name: "Home",
    props: ['token', 'action_login'],
    methods: {},
    data () {
        return {}
    },
    components: {},
    computed: {},
    beforeMount() {},
    created() {},
    mounted() {}
}
</script>

<style scoped>

</style>
