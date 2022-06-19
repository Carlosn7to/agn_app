<template>

    <!-- Formulário pra preenchimento completo -->
    <div class="modal display-flex" v-if="this.modal.status === true && this.modal.form.new.status === true">
        <div class="box-changes" style="width: 70%; height: 90%; background-color: #F3F3F8;">
            <div class="close-btn">
                <i class="fi fi-rr-cross-small" @click="modal_actions(0,0,0)"></i>
            </div>
            <h6 style="text-align: center;">Novo formulário</h6>
            <form :action="form_new" method="post" style="width: 100%; overflow-y: auto">
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
                                <input type="text" name="question" id="question" style="width: 100%" required>
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
                                    <template v-for="(item, key) in this.modal.form.new.questions.inputs">
                                        <div class="display-flex" style="gap: 1rem; justify-content: left">
                                            <label :for="item.id" style="font-size: 1.4rem">{{ key+1 }}:</label>
                                            <input type="text" :name="item.id" :id="item.id">
                                            <template v-if="modal.form.new.count > 1">
                                                <span class="decrease display-flex" @click="add_answers(1)"><i class="fi fi-rr-cross"></i></span>
                                            </template>
                                            <template v-if="modal.form.new.count === key+1">
                                                <span class="plus display-flex" @click="add_answers(0)"><i class="fi fi-rr-plus"></i></span>
                                            </template>
                                        </div>
                                    </template>
                                    <input type="hidden" name="register_answers" :value="this.modal.form.new.count">
                                </template>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <div class="field-form-new" :class="{ field_active : this.class.form.id === 3 }" @focusin="classActive(3)" @focusout="classActive(0)">
        <label for="sectors" :class="{ active_label :this.class.form.id === 3}">Setores</label>
        <br>
        <div class="input-checkbox">
            <input type="checkbox" name="comercial" id="comercial">
            <label for="comercial">Comercial</label>
        </div>
        <div class="input-checkbox">
            <input type="checkbox" name="tecnico" id="tecnico">
            <label for="tecnico">Técnico</label>
        </div>
    </div>

</template>

<script>
export default {
    name: "FormNEw"
}
</script>

<style scoped>

</style>
