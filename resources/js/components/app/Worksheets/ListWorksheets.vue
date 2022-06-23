<template>
    <div>
        <h6>Planilhas disponíveis</h6>
        <div class="management-form" style="margin-top: 2vh">
            <table id="mgn-form">
                <thead>
                <tr>
                    <th style="width: 50%">Nome</th>
                    <th>Criador</th>
                    <th style="text-align: center">Status</th>
                    <th style="border-right: none; text-align: center">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr id="tableForms" v-for="worksheet in data">
                    <td style="width: 60%">{{ worksheet.name }}</td>
                    <td style="font-size: 1.4rem; width: 30%"> {{ str_sanitize(worksheet.users.first_name) }} {{ str_sanitize(worksheet.users.last_name) }} </td>
                    <td style="text-align: center"><span class="status Ativo">{{ worksheet.status.name }}</span></td>
                    <td style="text-align: center; width: 10%; gap: 1rem; display: flex; align-items: center;">
                        <i class="fi fi-rr-edit"></i>
                        <template v-if="worksheet.status_id === 1">
                            <i class="fi fi-rr-box"></i>
                            <i class="fi fi-rr-redo" @click="alert(worksheet.id)"></i>
                        </template>
                        <template v-if="worksheet.status_id === 2">
                            <i class="fi fi-rr-checkbox"></i>
                        </template>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

export default {
    name: "ListWorksheets",
    props: {
        title: {
            type: String,
            default: 'Planilhas'
        },
        authorization: {
            type: String,
            required: true
        },
        api_worksheets_list: {
            type: String,
            required: true
        },
        string_sanitize: Function,
    },
    methods: {
        get_all_worksheets: function () {
            axios ({
                method: 'get',
                url: this.api_worksheets_list,
                headers: {
                    authorization: this.authorization
                }
            })
                .then((res) => {
                    this.data = res.data
                })
                .catch((error) => {
                })
        },
        str_sanitize: function (string) {
            return this.string_sanitize(string)
        },
        alert: function (worksheet_id) {
            alert(worksheet_id)
        }
    },
    data () {
        return {
            data: {}
        }
    },
    components: {

    },
    computed: {},
    beforeMount() {
        this.get_all_worksheets()
    },
    created() {},
    mounted() {}
}
</script>

<style scoped>
    .management-form {
        width: 90%;
    }
</style>
