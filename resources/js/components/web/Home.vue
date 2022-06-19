<template>
    <div class="container-main-web">
        <header>

        </header>
        <main>
            <div class="card-login-web">
                <div class="welcome-logo" >
                    <img :src="logo_company" alt="">
                </div>
                <form :action="action_login" method="POST">
                    <input type="hidden" name="_token" :value="token">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                    <input type="submit" value="ENTRAR">
                </form>
                <div class="border-divisor">
                    <div class="item-divisor" style="width: 100%;">

                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
</template>

<script>
export default {
    name: "Home",
    props: ['token', 'action_login', 'logo_company'],
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
