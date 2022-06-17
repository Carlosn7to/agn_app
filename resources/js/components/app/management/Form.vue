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
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0), 0"></i>
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
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.new === true">
            <div class="fill-form shadow-standard">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0), 0"></i>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Form",
    props: ['get_forms_all', 'update_status_form', 'new_form', 'get_questions'],
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

                    console.log(this.form_data)
                })
                .catch((error) => {
                })
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
                    new: false,
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
