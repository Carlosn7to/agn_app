<template>
    <div class="container-app" style="padding: 2vh 2vw;">
        <h6>Gerenciamento de formulários</h6>
        <div class="management-form">
            <table id="mgn-form">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th>Nome do formulário</th>
                        <th style="text-align: center">Status</th>
                        <th style="border-right: none; text-align: center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>Instalação</td>
                        <td style="text-align: center">Ativo</td>
                        <td style="text-align: center"><i class="fi fi-rr-edit"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Form",
    props: [],
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
