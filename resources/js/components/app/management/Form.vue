<template>
    <div class="container-app" style="padding: 2vh 2vw;">
        <h6>Gerenciamento de formulários</h6>
        <button @click="add_form(1)" class="new-btn">Novo formulário</button>
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
                        <td style="width: 50%">{{ string_sanitaze(form.name) }}</td>
                        <td style="text-align: center"><span class="status" :class="form.status.name">{{ string_sanitaze(form.status.name) }}</span></td>
                        <td style="font-size: 1.4rem; width: 30%">{{ form.users.first_name }} {{ string_sanitaze(form.users.last_name) }}</td>
                        <td style="text-align: center; width: 10%; gap: 1rem; display: flex; align-items: center;">
                            <i class="fi fi-rr-edit" @click="modal_actions(1, 1, form.id, form.name)"></i>
                            <template v-if="form.status_id === 1">
                                <i class="fi fi-rr-box" @click="modal_actions(1, 2, form.id, form.name)"></i>
                                <i class="fi fi-rr-redo" @click="modal_actions(1, 4, form.id, form.name)"></i>
                            </template>
                            <template v-if="form.status_id === 2">
                                <i class="fi fi-rr-checkbox" @click="modal_actions(1, 3, form.id, form.name)"></i>
                            </template>
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
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.use.status === true">
            <div class="fill-form shadow-standard">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0, 0)"></i>
                </div>
                <div class="selections-form">
                    <h6>Formulário de {{ this.modal.form.use.name }}</h6>
                    <form :action="new_form" method="POST" name="form" autocomplete="off" id="form">
                        <input type="hidden" name="_token" :value="token">
                        <template v-for="data in form_data">
                            <div class="item-selection-form">
                                <template v-if="data.force === 1">
                                    <span>{{ data.question }} <b style="color: var(--color-red)">*</b></span>
                                </template>
                                <template v-if="data.force === 0">
                                    <span>{{ data.question }}</span>
                                </template>
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
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.new.status === true">
            <div class="box-changes new-form">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0,0)"></i>
                </div>
                <h6>Novo formulário</h6>
                <div class="fields-form-new">
                    <form method="post" @submit.prevent="post_form()">
                        <input type="hidden" name="user_id" id="user_id" :value="user_id">
                        <input type="hidden" name="token" :value="token">
                        <div class="field-form-new" :class="{ field_active : this.class.form.id === 1 }" @focusin="classActive(1)" @focusout="classActive(0)">
                            <label for="title" :class="{ active_label :this.class.form.id === 1}">Nome <b style="color: var(--color-red)">*</b></label>
                            <input type="text" name="name" id="name" required v-model="forms.new.inputs.name" autocomplete="off">
                        </div>
                        <div class="field-form-new" :class="{ field_active : this.class.form.id === 2 }" @focusin="classActive(2)" @focusout="classActive(0)">
                            <label for="description" :class="{ active_label :this.class.form.id === 2}">Descrição</label>
                            <input type="text" name="description" id="description" autocomplete="off">
                        </div>
                        <input type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
    </div>
        <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.edit.status === true">
            <div class="box-changes edit-form">
                <div class="close-btn">
                    <i class="fi fi-rr-cross-small" @click="modal_actions(0,0,0)"></i>
                </div>
                <h6>Editar formulário</h6>
                <div class="container-edit-form">
                    <div class="fields-edit-form animation-opacity" style="overflow-y: auto" v-if="this.modal.form.edit.step === 1">
                        <template v-for="form in forms.edit.data">
                        <h6>Formulário de <b>{{ string_sanitaze(form.name) }}</b></h6>
                            <template v-for="data in form.questions_answers">
                                <div class="field-edit-form">
                                    <template v-if="data.force === 1">
                                        <span>{{ data.question }} <b style="color: var(--color-red)">*</b></span>
                                    </template>
                                    <template v-if="data.force === 0">
                                        <span>{{ data.question }}</span>
                                    </template>
                                    <div class="input-selection-form" v-for="an in data.answers">
                                        <template v-if="data.force === 1">
                                            <template v-if="data.type === 'radio'">
                                                <input :type="data.type" :name="data.id" :value="an.id" :id="an.id" disabled>
                                            </template>
                                            <template v-if="data.type !== 'radio'">
                                                <input :type="data.type" :name="data.id" :id="an.id" disabled>
                                            </template>
                                        </template>
                                        <template v-if="data.force === 0">
                                            <input :type="data.type" :name="data.id" :value="an.id" :id="an.id" disabled>
                                        </template>
                                        <template v-if="data.type === 'radio'">
                                            <label for="type">{{ an.answer }}</label>
                                        </template>
                                        <template v-if="data.type !== 'radio'">
                                            <label for="type">{{ an.answer }}</label>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </div>
                    <div class="fields-edit-form" v-if="this.modal.form.edit.step === 2">
                        <h6>Configurações gerais</h6>
                        <div class="options-main-edit animation-left">
                            <nav>
                                <ul>
                                    <li @click="modal_form_edit(3)">
                                        <span>Editar título</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                    <li>
                                        <span>Editar permissões de visualização</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                    <li @click="modal_form_edit(5)">
                                        <span>Adicionar perguntas</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                    <li @click="modal_form_edit(6)">
                                        <span>Editar perguntas</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="fields-edit-form" v-if="this.modal.form.edit.step === 3">
                        <div class="back-next">
                            <i class="fi fi-rr-arrow-small-left" @click="modal_form_edit(2)"></i>
                            <span>Editar título</span>
                        </div>
                        <div class="options-main-edit animation-left">
                            <nav>
                                <ul v-for="form in forms.edit.data" class="field-copy">
                                    <li style="cursor: initial">
                                        <span>Título antigo: <b>{{ string_sanitaze(form.name) }}</b></span>
                                    </li>
                                    <li  style="border: none; cursor: default">
                                        <form action="#" method="POST" id="form_title" @submit.prevent="edit_name_form(form.id)">
                                            <input type="hidden" name="token" :value="token">
                                            <label for="name">Novo título: </label>
                                            <input type="text" name="name" id="name" v-model="forms.edit.inputs.name" required>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <input class="btn-submit animation-left" type="submit" value="Alterar" form="form_title">
                    </div>
                    <div class="fields-edit-form" v-if="this.modal.form.edit.step === 5">
                        <div class="back-next">
                            <i class="fi fi-rr-arrow-small-left" @click="modal_form_edit(2)"></i>
                            <span>Adicionar pergunta</span>
                        </div>
                        <div class="options-main-edit animation-left">
                            <nav>
                                <ul v-for="form in forms.edit.data" class="field-copy">
                                    <form method="POST" id="form_question" @submit.prevent="new_questions_answers(form.id)">
                                        <div class="field-new-question">
                                            <label for="name">Pergunta:</label>
                                            <input type="text" name="question" id="question" v-model="forms.new.questions.inputs.question" required>
                                        </div>
                                        <div class="field-new-question" style="flex-direction: column; justify-content: left; align-items: initial">
                                            <label for="name">Tipo de pergunta:</label>
                                            <div class="radios-new-question">
                                                <div class="radio-new-question">
                                                    <input type="radio" name="type" value="text" v-model="forms.new.questions.inputs.type" @click="add_questions(0)">
                                                    <label for="type">Texto</label>
                                                </div>
                                                <div class="radio-new-question">
                                                    <input type="radio" name="type" value="date" v-model="forms.new.questions.inputs.type" @click="add_questions(0)">
                                                    <label for="type">Data</label>
                                                </div>
                                                <div class="radio-new-question">
                                                    <input type="radio" name="type" value="radio" v-model="forms.new.questions.inputs.type" @click="add_questions(1)">
                                                    <label for="type">Múltiplas escolhas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-new-question" style="flex-direction: column; justify-content: left; align-items: initial">
                                            <label for="name">Obrigatória:</label>
                                            <div class="radios-new-question">
                                                <div class="radio-new-question">
                                                    <input type="radio" name="force" value="1" v-model="forms.new.questions.inputs.force">
                                                    <label for="force">Sim</label>
                                                </div>
                                                <div class="radio-new-question">
                                                    <input type="radio" name="force" value="0" v-model="forms.new.questions.inputs.force">
                                                    <label for="force">Não</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </ul>
                            </nav>
                        </div>
                        <input class="btn-submit animation-left" type="submit" value="Adicionar pergunta" form="form_question">
                    </div>
                    <div class="fields-edit-form" v-if="this.modal.form.edit.step === 6">
                        <div class="back-next">
                            <i class="fi fi-rr-arrow-small-left" @click="modal_form_edit(2)"></i>
                            <span>Editar campos</span>
                        </div>
                        <div class="options-main-edit animation-left">
                            <nav v-if="this.modal.form.edit.step === 6">
                                <ul>
                                    <template v-for="form in forms.edit.data">
                                        <template v-for="questions in form.questions_answers">
                                            <li @click="questions_answers(questions.id)">
                                                <span>{{ string_sanitaze(questions.question) }}</span>
                                                <i class="fi fi-rr-angle-right"></i>
                                            </li>
                                        </template>
                                    </template>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="fields-edit-form" v-if="this.modal.form.edit.step === 7">
                        <div class="back-next">
                            <i class="fi fi-rr-arrow-small-left" @click="modal_form_edit(6)"></i>
                            <span>Editar campos</span>
                        </div>
                        <div class="options-main-edit animation-left">
                            <nav v-if="this.modal.form.edit.step === 7">
                                <ul>
                                    <li @click="alertar(1)">
                                        <span>Título</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                    <li @click="alertar(1)">
                                        <span>Tipo</span>
                                        <i class="fi fi-rr-angle-right"></i>
                                    </li>
                                    <template v-if="this.forms.edit.questions.data.type === 'radio'">
                                        <li @click="alertar(1)">
                                            <span>Respostas pré-definidas</span>
                                            <i class="fi fi-rr-angle-right"></i>
                                        </li>
                                    </template>
                                </ul>
                            </nav>
                        </div>
                        <div class="field-edit-form animation-left">
                            <template v-if="this.forms.edit.questions.data.force === 1">
                                <span>{{ this.forms.edit.questions.data.question }} <b style="color: var(--color-red)">*</b></span>
                            </template>
                            <template v-if="this.forms.edit.questions.data.force === 0">
                                <span>{{ this.forms.edit.questions.data.question }}</span>
                            </template>
                            <div class="input-selection-form" v-for="an in this.forms.edit.questions.data.answers">
                                <template v-if="forms.edit.questions.data.type === 'radio'">
                                    <input :type="forms.edit.questions.data.type" :name="forms.edit.questions.data.id" :value="an.id" :id="an.id" disabled>
                                </template>
                                <template v-if="forms.edit.questions.data.type !== 'radio'">
                                    <input :type="forms.edit.questions.data.type" :name="forms.edit.questions.data.id" :id="an.id" disabled>
                                </template>
                                <template v-if="forms.edit.questions.data.force === 0">
                                    <input :type="forms.edit.questions.data.type" :name="forms.edit.questions.data.id" :value="an.id" :id="an.id" disabled>
                                </template>
                                <template v-if="forms.edit.questions.data.type === 'radio'">
                                    <label for="type">{{ an.answer }}</label>
                                </template>
                                <template v-if="forms.edit.questions.data.type !== 'radio'">
                                    <label for="type">{{ an.answer }}</label>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="options-edit-form">
                        <h6>Menu de edição</h6>
                        <div class="border-divisor">
                            <div class="item-divisor" style="width: 60%">

                            </div>
                        </div>
                        <nav>
                            <ul>
                                <li @click="modal_form_edit(1)">
                                    <i class="fi fi-rr-form"></i>
                                    <span>Visualizar formulário</span>
                                </li>
                                <li @click="modal_form_edit(2)">
                                    <i class="fi fi-rr-settings"></i>
                                <span>Configurações gerais</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "Form",
    props: ['get_forms_all', 'update_status_form', 'new_form', 'get_questions', 'token', 'form_new', 'user_id', 'get_form_questions_answers', 'edit_form', 'new_question', 'get_question_answers'],
    methods: {
        modal_actions(on, step, id, form_name){
            if(on === 0) {
                this.modal.status = false
                this.modal.form.use.status = false
                this.modal.form.new.status = false
                this.modal.form.edit.status = false
                this.modal.step = step
                this.modal.form.edit.step = 1
                this.get_all_forms()
            } else {
                this.modal.status = true
                this.modal.step = step
                this.modal.id = id

                if(step === 1) {
                    this.modal.form.edit.status = true
                    this.form_questions_answers(id)
                }

                if(step === 4) {
                    this.modal.form.use.status = true
                    this.modal.form.use.name = form_name
                    this.get_form(id)
                }
            }
        },
        modal_form_edit(step){
            this.modal.form.edit.step = step
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
        add_form(on){

            if(on === 1) {
                this.modal.status = true
                this.modal.form.new.status = true
            } else {
                this.modal.status = false
                this.modal.form.new.status = false
            }
        },
        add_questions(on) {

            if(on === 0) {
                this.modal.form.new_question.status = false
            } else {
                this.modal.form.new_question.status = true
            }
        },
        classActive(n) {
            this.class.form.id = n
        },
        post_form(){

            axios
                ({
                    method: 'post',
                    url: this.form_new,
                    data: {
                        token: this.token,
                        user_id: this.user_id,
                        name: this.forms.new.inputs.name,
                        description: this.forms.new.inputs.description
                    }
                })
                .then((res) => {
                    this.get_all_forms()
                    this.modal.status = false
                    this.modal.form.new.status = false
                    this.forms.new.inputs.name = ''
                    this.forms.new.inputs.description = ''
                })
                .catch((error) => {
                })
        },
        string_sanitaze(string) {

            var text = string.toLowerCase()
            var words = text.split(" ")

            words =  words.map((word) => {
                            return word[0].toUpperCase() + word.substring(1);
                        }).join(" ");

            return words
        },
        form_questions_answers(id){
            axios
            ({
                method: 'post',
                url: this.get_form_questions_answers,
                data: {
                    token: this.token,
                    hash: 'd41d8cd98f00b204e9800998ecf8427e',
                    user: 'system',
                    password: 'jF7s3o1oecRka2&ru^ovt',
                    form_id: id,
                }
            })
                .then((res) => {
                    this.forms.edit.data = res.data
                })
                .catch((error) => {
                })
        },
        questions_answers(id){

            axios
            ({
                method: 'post',
                url: this.get_question_answers,
                data: {
                    token: this.token,
                    hash: 'd41d8cd98f00b204e9800998ecf8427e',
                    user: 'system',
                    password: 'jF7s3o1oecRka2&ru^ovt',
                    question_id: id,
                }
            })
                .then((res) => {
                    this.modal.form.edit.step = 7
                    console.log(res.data)
                    this.forms.edit.questions.data = res.data
                })
                .catch((error) => {
                })

        },
        new_questions_answers(id){
            axios
            ({
                method: 'post',
                url: this.new_question,
                data: {
                    token: this.token,
                    hash: 'd41d8cd98f00b204e9800998ecf8427e',
                    user: 'system',
                    password: 'jF7s3o1oecRka2&ru^ovt',
                    status_id: 1,
                    question: this.forms.new.questions.inputs.question,
                    force: this.forms.new.questions.inputs.force,
                    type: this.forms.new.questions.inputs.type,
                    form_id: id,
                    user_id: this.user_id,

                }
            })
                .then((res) => {
                    console.log(res.data)
                    this.form_questions_answers(id)
                    this.modal.form.edit.step = 1
                    this.forms.new.questions.inputs.force = 0,
                    this.forms.new.questions.inputs.type = '',
                    this.forms.new.questions.inputs.question = ''
                })
                .catch((error) => {
                })
        },
        alertar(n){
            console.log(n)
        },
        edit_name_form(id){
            axios
            ({
                method: 'post',
                url: this.edit_form,
                data: {
                    token: this.token,
                    hash: 'd41d8cd98f00b204e9800998ecf8427e',
                    user: 'system',
                    password: 'jF7s3o1oecRka2&ru^ovt',
                    form_id: id,
                    name: this.forms.edit.inputs.name
                }
            })
                .then((res) => {
                    this.form_questions_answers(id)
                    this.modal.form.edit.step = 1
                    this.forms.edit.inputs.name = ''

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
                    edit: {
                        status: false,
                        name: '',
                        step: 1

                    },
                    new_question: {
                        status: false,
                        count: 0,
                        questions: {
                            inputs: [{
                                id: 'answer1'
                            }],
                            status: false
                        }
                    },
                    use: {
                        status: false,
                        name: ''
                    },
                    new: {
                        status: false
                    }
                }
            },
            form_data: {},
            class: {
                form: {
                    active: false,
                    id: 0
                }
            },
            forms: {
                new: {
                    inputs: [{
                        token: '',
                        user_id: 0,
                        name: '',
                        description: ''
                    }],
                    questions: {
                        inputs: [{
                            question: '',
                            status_id: 1,
                            force: 0,
                            type: '',
                            form_id: 0,
                            user_id: this.user_id
                        }]
                    }
                },
                edit: {
                    data: {},
                    inputs: [{
                        name: ''
                    }],
                    questions: {
                        data: {}
                    }
                }
            },
        }
    },
    components: {},
    computed: {},
    beforeMount() {},
    created() {
    },
    mounted() {
        this.get_all_forms()
    }
}
</script>

<style scoped>

</style>
