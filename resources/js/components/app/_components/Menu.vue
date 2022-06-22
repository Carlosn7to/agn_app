<template>
    <div class="menu-app">
        <header>
            <div class="logo-company">
                <img :src="logo_company" alt="logo da empresa">
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
                    <span>Operacional</span>
                    <nav>
                        <ul>
                            <li>
                                <a :href="page_forms">
                                    <i class="fi fi-rr-form"></i>
                                    <span>Formulários</span>
                                </a>
                            </li><li>
                                <a :href="page_worksheets">
                                    <i class="fi fi-rr-file-spreadsheet"></i>
                                    <span>Planilhas</span>
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
            </div>
        </main>
        <footer>

        </footer>
    </div>
</template>

<script>
export default {
    name: "Menu",
    props: ['logo_company', 'user_photo', 'page_home', 'page_forms', 'mng_form', 'get_user', 'user_id', 'page_worksheets'],
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
            })
            .catch((error) => {
            })
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
