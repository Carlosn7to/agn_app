<template>
    <div>
        <h6>Planilha de Instalação</h6>

        <table>
            <thead>
                <tr>
                   <template v-for="question in data.questions.data">
                       <th>
                           {{  question.question }}
                       </th>
                   </template>
                </tr>
            </thead>
            <tbody>
                <template v-for="forms in data.answers.forms_submitteds">
                    <tr>
                        <template v-for="an in forms.answers">
                            <td>
                                {{ an.answer }}
                            </td>
                        </template>
                    </tr>
                </template>
            </tbody>
        </table>

    </div>
</template>

<script>

export default {
    name: "Worksheet",
    props: {
        authorization: {
            type: String,
            required: true
        },
        api_worksheet_answers: {
            type: String,
            required: true
        },
        string_sanitize: Function,
        api_questions_list: {
            type: String,
            required: true
        }
    },
    methods: {
        str_sanitize: function (string) {
            return this.string_sanitize(string)
        },
        get_questions_list: function() {
            axios ({
                 method: 'get',
                 url: this.api_questions_list+'/'+1,
                 headers: {
                     authorization: this.authorization
                 }
             })
                 .then((res) => {
                     this.data.questions.data = res.data
                 })
                 .catch((error) => {
                 })
        },
        get_worksheet_answers: function () {
            axios ({
                method: 'get',
                url: this.api_worksheet_answers+'/'+1,
                headers: {
                    authorization: this.authorization
                }
            })
                .then((res) => {
                    this.data.answers = res.data
                })
                .catch((error) => {
                })
        },
    },
    data() {
        return {
            data: {
                answers: {},
                questions: {
                    id: 1,
                    data: {}
                }
            }
        }
    },
    components: {},
    computed: {},
    beforeMount() {
        this.get_worksheet_answers()
        this.get_questions_list()
    },
    created() {
    },
    mounted() {
    }
}
</script>

<style scoped>
table {
    width: 90%;
    background-color: #fff;
    border-radius: 10px;
    text-align: left;
    margin-top: 2vh;
    border-collapse: collapse;
}

table th {
    font-size: 1.4rem;
    color: #4a5568;
    font-weight: 600;
    height: 7vh;
    border-bottom: 2px solid #cccccc40;
    padding: 0 1vw;
}

table th {
    border-right: 2px solid #cccccc40;
}

table th:last-child {
    border-right: none;
}

table tbody tr {
    border-bottom: 1px solid #cccccc40;
}

table tr td {
    font-size: 1.2rem;
    font-weight: 500;
    color: #333;
    padding: 0 1vw;
    height: 6vh;
}
</style>
