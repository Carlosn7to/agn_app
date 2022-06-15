<template>
    <div class="container-app" style="padding: 2vh 0vw">
        <div class="container-form">
            <h6>Formulários disponíveis</h6>
            <div class="items-form">
                <div class="item-form" @click="formStep(1, 1)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-modal" v-if="this.form.modal === true">
            <div class="fill-form shadow-standard">
                <div style="width: 100%; display: flex; flex-direction: row-reverse">
                    <i class="fi fi-rr-cross" style="font-size: 2rem; color: var(--color-red); cursor: pointer" @click="formStep(0,0)"></i>
                </div>
                <div class="selections-form" v-if="this.form.type_form === 1">
                    <h6>Formulário de Instalação</h6>

                    <form :action="actions_new" method="POST" name="form" autocomplete="off">
                        <input type="hidden" name="_token" :value="token">
                        <div class="item-selection-form">
                            <span>TIPO <b style="color: var(--color-red)">*</b></span>

                            <div class="input-selection-form">
                                <input type="radio" name="type" value="1" id="type" checked>
                                <label for="type">Instalação</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="type" value="2">
                                <label for="type">Reagendamento da instalação</label>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>EMPRESA RESPONSÁVEL PELA VENDA <b style="color: var(--color-red)">*</b></span>

                            <div class="input-selection-form">
                                <input type="radio" name="company" id="company" value="1" checked>
                                <label for="company">AGE</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="company" value="2">
                                <label for="company">WT</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="company" value="3">
                                <label for="company">Não se aplica</label>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>DATA <b style="color: var(--color-red)">*</b></span>
                            <div class="input-selection-form">
                                <input type="date" name="date" style="border: none; border-bottom: 1px solid #cccccc90; font-size: 1.6rem" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>CIDADES <b style="color: var(--color-red)">*</b></span>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Samambaia" checked>
                                <label for="city">Samambaia</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Recanto das Emas">
                                <label for="city">Recanto das Emas</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Riacho Fundo I">
                                <label for="city">Riacho Fundo I</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Riacho Fundo II">
                                <label for="city">Riacho Fundo II</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Gama">
                                <label for="city">Gama</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Lago Sul">
                                <label for="city">Lago Sul</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Santa Maria">
                                <label for="city">Santa Maria</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Guará">
                                <label for="city">Guará</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Ponte Alta">
                                <label for="city">Ponte Alta</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Jardim Botânico">
                                <label for="city">Jardim Botânico</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Vicente Pires">
                                <label for="city">Vicente Pires</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="city" value="Ceilândia" >
                                <label for="city">Ceilândia</label>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>PERÍODO <b style="color: var(--color-red)">*</b></span>
                            <span style="font-size: 1.2rem;">Manhã: 08h às 12h: 14h às 18h.</span>
                            <div class="input-selection-form">
                                <input type="radio" name="period" value="1" checked>
                                <label for="period">MANHÃ</label>
                            </div>
                            <div class="input-selection-form">
                                <input type="radio" name="period" value="2">
                                <label for="period">TARDE</label>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>NOME DO CLIENTE <b style="color: var(--color-red)">*</b></span>
                            <div class="input-selection-form">
                                <input type="text" name="name" id="" placeholder="Sua resposta" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>CÓDIGO DO CLIENTE <b style="color: var(--color-red)">*</b></span>
                            <div class="input-selection-form">
                                <input type="text" name="cod" id="" placeholder="Sua resposta" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>O.S <b style="color: var(--color-red)">*</b></span>
                            <span style="font-size: 1.2rem;">Número da ordem de serviço</span>
                            <div class="input-selection-form">
                                <input type="text" name="os" placeholder="Sua resposta" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>TELEFONE <b style="color: var(--color-red)">*</b></span>
                            <span style="font-size: 1.2rem;">Com (DDD)</span>
                            <div class="input-selection-form">
                                <input type="text" name="tel" placeholder="Sua resposta" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>ENDEREÇO <b style="color: var(--color-red)">*</b></span>
                            <div class="input-selection-form">
                                <input type="text" name="address" placeholder="Sua resposta" required>
                            </div>
                        </div>
                        <div class="item-selection-form">
                            <span>Observações</span>
                            <div class="input-selection-form">
                                <input type="text" name="obs" placeholder="Sua resposta">
                            </div>
                        </div>
                        <input type="submit" value="Enviar" form="form" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Forms",
    props: ['actions_new', 'token', 'forms'],
    methods: {
        formStep(status, type_form) {

            if(status === 0) {
                this.form.modal = false
                this.form.type_form = type_form
            }

            if(status === 1) {
                this.form.modal = true
                this.form.type_form = type_form
            }

        }
    },
    data () {
        return {
            form: {
                modal: false,
                type_form: 0
            }
        }
    },
    components: {},
    computed: {},
    beforeMount() {
        console.log(this.forms)
    },
    created() {
    },
    mounted() {
        axios
            .get('')
    }
}
</script>

<style scoped>

</style>
