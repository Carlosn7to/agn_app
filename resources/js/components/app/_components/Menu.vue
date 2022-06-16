<template>
    <div class="menu-app shadow-standard">
        <header>
            <div class="logo-company">
                <img :src="logo_company" alt="logo da empresa">
            </div>
            <div class="border-divisor">
                <div class="item-divisor" style="width: 100%">

                </div>
            </div>
            <div class="data-user-menu">
                <img :src="user_photo" alt="" class="shadow-standard">
                    <p>Carlos Neto</p>
                    <span>Analista de gestão</span>
            </div>
        </header>
        <div class="border-divisor">
            <div class="item-divisor">

            </div>
        </div>
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
    props: ['logo_company', 'user_photo', 'page_home', 'page_forms', 'mng_form'],
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
