<template>
    <div class="container-app" style="padding: 2vh 2vw;">
        <h6>Gerenciamento de formulários</h6>
        <div class="management-form">
            <table id="mgn-form">
                <thead>
                    <tr>
                        <th style="width: 50%">Nome</th>
                        <th style="text-align: center">Status</th>
                        <th>Criador</th>
                        <th style="border-right: none; text-align: center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="form in this.data" id="tableForms">
                        <td style="width: 50%">{{ form.name }}</td>
                        <td style="text-align: center"><span class="status" :class="form.status.name">{{ form.status.name }}</span></td>
                        <td style="font-size: 1.4rem; width: 30%">{{ form.users.first_name }} {{ form.users.last_name }}</td>
                        <td style="text-align: center; width: 10%; gap: 1rem; display: flex; align-items: center;">
                            <i class="fi fi-rr-edit" @click="modal_actions(1, 1, form.id)"></i>
                            <template v-if="form.status_id === 1">
                                <i class="fi fi-rr-box" @click="modal_actions(1, 2, form.id)"></i>
                            </template>
                            <template v-if="form.status_id === 2">
                                <i class="fi fi-rr-checkbox" @click="modal_actions(1, 3, form.id)"></i>
                            </template>
                            <i class="fi fi-rr-redo" @click="modal_actions(1, 4, form.id)"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal display-flex" v-if="this.modal.status === true && (this.modal.step === 2 || this.modal.step === 3)">
            <div class="box-changes" v-if="this.modal.step === 2">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
                <div class="msg-box trigger">
                    <i class="fi fi-rr-shield-exclamation"></i>
                    <p>Arquivar formulário</p>
                </div>
                <div class="alert-box">
                    <div class="alert-msg">
                        <span>Atenção! Essa ação vai causar:</span>
                        <div style="padding: 3vh 0 0 0; display: flex; flex-direction: column; gap: .5rem">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #EC344E"></i>
                                <p>
                                    Inacessiblidade dos links compartilhados
                                </p>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #EC344E"></i>
                                <p>
                                    Remoção da agenda vinculada
                                </p>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #EC344E"></i>
                                <p>
                                    Impossibilidade de relatórios
                                </p>
                            </div>
                            <div class="i-gree">
                                <button @click="form_action(2 ,modal.id)">
                                    <i class="fi fi-br-trash"></i>
                                    <span>Sim, arquivar o formulário</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-changes" v-if="this.modal.step === 3">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
                <div class="msg-box sucess">
                    <i class="fi fi-rr-check"></i>
                    <p>Ativar formulário</p>
                </div>
                <div class="alert-box">
                    <div class="alert-msg">
                        <span>Atenção! Essa ação vai causar:</span>
                        <div style="padding: 3vh 0 0 0; display: flex; flex-direction: column; gap: .5rem">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #4AD09E"></i>
                                <p>
                                    Acessiblidade dos links compartilhados
                                </p>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #4AD09E"></i>
                                <p>
                                    Adição da agenda vinculada
                                </p>
                            </div>
                            <div style="display: flex; align-items: center; gap: 1rem">
                                <i class="fi fi-rr-checkbox" style="font-size: 1.8rem; color: #4AD09E"></i>
                                <p>
                                    Possibilidade de relatórios
                                </p>
                            </div>
                            <div class="i-gree">
                                <button class="sucess-background" @click="form_action(1, modal.id)">
                                    <i class="fi fi-rr-shield-check"></i>
                                    <span>Sim, ativar o formulário</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.step === 1">
            <div class="fill-form shadow-standard">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
            </div>
        </div>
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.use === true">
            <div class="fill-form shadow-standard">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
                <div class="selections-form">
                    <h6>Formulário</h6>
                    <form :action="new_form" method="POST" name="form" autocomplete="off" id="form">
                        <input type="hidden" name="_token" :value="token">
                        <template v-for="data in form_data">
                            <div class="item-selection-form">
                                <span>{{ data.question }} <b style="color: var(--color-red)">*</b></span>
                                <div class="input-selection-form" v-for="an in data.answers">
                                    <template v-if="data.force === 1">
                                        <template v-if="data.type === 'radio'">
                                            <input :type="data.type" :name="data.id" :value="an.id" :id="an.id" required>
                                        </template>
                                        <template v-if="data.type !== 'radio'">
                                            <input :type="data.type" :name="data.id" :id="an.id" required>
                                        </template>
                                    </template>
                                    <template v-if="data.force === 0">
                                        <input :type="data.type" :name="data.id" :value="an.id" :id="an.id">
                                    </template>
                                    <label for="type">{{ an.answer }}</label>
                                </div>
                            </div>
                        </template>
                        <input type="submit" value="Enviar" form="form">
                    </form>
                </div>
            </div>
        </div>
        <div class="modal display-flex" v-if="this.modal.status === false && this.modal.form.new.status === false">
            <div class="box-changes" style="width: 70%; height: 90%; background-color: #F3F3F8;">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
                <h6 style="text-align: center;">Novo formulário</h6>
                <form action="#" style="width: 100%; height: 95%; overflow-y: auto ">
                    <div class="title-new-form display-flex" style="padding: 2vh 2vw; flex-direction: column; gap: 1rem; ">
                        <div class="item-selection-form" style="width: 40%">
                            <div class="input-selection-form" style="margin: 1vh 0 0 0">
                                <label for="question">Título: </label>
                                <input type="text" name="title" id="title" style="width: 100%" required>
                            </div>
                        </div>
                        <div class="item-selection-form" style="width: 40%">
                            <div class="input-selection-form" style="margin: 1vh 0 0 0; flex-direction: column; align-items: initial">
                                <div class="display-flex">
                                    <label for="question">Pergunta: </label>
                                    <input type="text" name="title" id="title" style="width: 100%" required>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 1rem">
                                    <label for="type_input" style="font-size: 1.4rem">Tipo de resposta:</label>
                                    <div class="display-flex" style="gap: 1rem; justify-content: left">
                                        <input type="radio" name="type_input" id="" value="text" checked required @click="add_questions(0)">
                                        <label for="type_input" style="font-size: 1.4rem">Texto</label>
                                    </div>
                                    <div class="display-flex" style="gap: 1rem; justify-content: left">
                                        <input type="radio" name="type_input" id="" value="date" required @click="add_questions(0)">
                                        <label for="type_input" style="font-size: 1.4rem">Data</label>
                                    </div>
                                    <div class="display-flex" style="gap: 1rem; justify-content: left">
                                        <input type="radio" name="type_input" id="" value="radio" required @click="add_questions(1)">
                                        <label for="type_input" style="font-size: 1.4rem">Múltiplas escolhas</label>
                                    </div>
                                    <template v-if="this.modal.form.new.questions.status === true">
                                        <div class="border-divisor">
                                            <div class="item-divisor">

                                            </div>
                                        </div>
                                        <label for="type_input" style="font-size: 1.4rem">Escolhas:</label>
                                        <template v-for="item in this.modal.form.new.count">
                                            <div class="display-flex" style="gap: 1rem; justify-content: left">
                                                <label for="answers" style="font-size: 1.4rem">{{ item }}:</label>
                                                <input type="text" name="anwers" id="1">
                                                <template v-if="item === 1">
                                                    <template v-if="modal.form.new.count === 1">
                                                        <span class="plus display-flex" @click="add_answers(0)"><i class="fi fi-rr-plus"></i></span>
                                                    </template>
                                                    <template v-if="modal.form.new.count > 1">
                                                        <span class="decrease display-flex" @click="add_answers(1)"><i class="fi fi-rr-cross"></i></span>
                                                    </template>
                                                </template>
                                                <template v-if="item > 1">
                                                    <template v-if="modal.form.new.count < item">
                                                        <span class="decrease display-flex" @click="add_answers(1)"><i class="fi fi-rr-cross"></i></span>
                                                    </template>
                                                    <template v-if="modal.form.new.count === item">
                                                        <span class="plus display-flex" @click="add_answers(0)"><i class="fi fi-rr-plus"></i></span>
                                                    </template>
                                                </template>
                                            </div>
                                        </template>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Form",
    props: ['get_forms_all', 'update_status_form', 'new_form', 'get_questions', 'token'],
    methods: {
        modal_actions(on, step, id){

            if(on === 0) {
                this.modal.status = false
                this.modal.form = false
            } else {
                this.modal.status = true
                this.modal.step = step
                this.modal.id = id

                if(step === 4) {
                    this.modal.form.use = true
                    this.get_form(id)
                }
            }

        },
        form_action(action, id) {
                // Ativar ou inativar o formulário

                axios
                    .post(this.update_status_form+'/'+action+'/'+id)
                    .then((res) => {
                        this.modal.status = false
                        this.modal.step = 0
                        this.modal.id = 0

                        this.get_all_forms()
                    })
                    .catch((error) => {
                    })

        },
        get_all_forms(){
            axios
                .get(this.get_forms_all)
                .then((res) => {
                    this.data = res.data
                })
                .catch((error) => {
                })
        },
        get_form(id) {
            axios
                .get(this.get_questions+'/'+id)
                .then((res) => {
                    this.form_data = res.data

                })
                .catch((error) => {
                })
        },
        add_questions(on) {

            if(on === 0) {
                this.modal.form.new.questions.status = false
            } else {
                this.modal.form.new.questions.status = true
            }
        },
        add_answers(n) {

            if(n === 0) {
                this.modal.form.new.questions.inputs.push({
                    id: `answer${++this.modal.form.new.count}}`
                })
            } else {
                this.modal.form.new.questions.inputs.pop({
                    id: `answer${--this.modal.form.new.count}}`
                })
            }
        }
    },
    data () {
        return {
            data: [],
            modal: {
                status: false,
                step: 0,
                id: 0,
                form: {
                    edit: false,
                    new: {
                        status: false,
                        count: 1,
                        questions: {
                            inputs: [{
                                id: 'answer1'
                            }],
                            status: false
                        }
                    },
                    use: false
                }
            },
            form_data: {}
        }
    },
    components: {},
    computed: {},
    beforeMount() {},
    created() {},
    mounted() {
        this.get_all_forms()
    }
}
</script>

<style scoped>

</style>
