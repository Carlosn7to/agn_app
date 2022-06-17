<template>
    <div class="menu-app">
        <header>
            <div class="logo-company">
                <img src="https://i.ibb.co/rszX1ct/AGE-ID-Logos-RGB-Logo-c-Elemento-04.png" alt="logo da empresa">
            </div>
            <div class="border-divisor">
                <div class="item-divisor" style="width: 100%">

                </div>
            </div>
        </header>
        <main>
            <div class="lists-menu">
                <div class="list-menu">
                    <span>Geral</span>
                    <nav>
                        <ul>
                            <li>
                                <a :href="page_home">
                                    <i class="fi fi-rr-home"></i>
                                    <span>Início</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="border-divisor">
                    <div class="item-divisor">

                    </div>
                </div>
                <div class="list-menu">
                    <span>Agendamentos</span>
                    <nav>
                        <ul>
                            <li>
                                <a :href="page_forms">
                                    <i class="fi fi-rr-add"></i>
                                    <span>Novo agendamento</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fi fi-rr-search-alt"></i>
                                    <span>Meus agendamentos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fi fi-rr-calendar"></i>
                                    <span>Agenda geral</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fi fi-rr-dashboard"></i>
                                    <span>Plano de capacidade</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="border-divisor">
                    <div class="item-divisor">

                    </div>
                </div>
                    <div class="list-menu">
                        <span>Gerenciamento</span>
                        <nav>
                            <ul>
                                <li>
                                    <a :href="mng_form">
                                        <i class="fi fi-rr-form"></i>
                                        <span>Formulários</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <div class="border-divisor">
                    <div class="item-divisor">

                    </div>
                </div>
                <div class="list-menu">
                    <span>Ajuda</span>
                    <nav>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fi fi-rr-graduation-cap"></i>
                                    <span>Tutoriais</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fi fi-rr-paper-plane"></i>
                                    <span>Suporte</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
</template>

<script>
export default {
    name: "Menu",
    props: ['logo_company', 'user_photo', 'page_home', 'page_forms', 'mng_form', 'get_user', 'user_id'],
    methods: {},
    data () {
        return {
            data_user: []
        }
    },
    components: {},
    computed: {},
    beforeMount() {
    },
    created() {
        axios
            .get(this.get_user+'/'+this.user_id)
            .then((res) => {
                this.data_user = res.data
                console.log(this.data_user)
            })
            .catch((error) => {
                console.log(error)
            })
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
