<template>
    <div class="container-app" style="padding: 2vh 0vw">
        <div class="container-form">
            <h6>Formulários disponíveis</h6>
            <div class="items-form">
                <div class="item-form" @click="cliick(1, 1)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>Instalação</span>
                </div>
                <div class="item-form" @click="cliick(1, 2)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>MP e ME</span>
                </div>
                <div class="item-form" @click="cliick(1, 3)">
                    <i class="fi fi-rr-tachometer-fast"></i>
                    <span>Vistoria Técnica</span>
                </div>
                <div class="item-form" @click="cliick(1, 4)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>Mudança de endereço</span>
                </div>
                <div class="item-form" @click="cliick(1, 5)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>Recolhimento de equipamento</span>
                </div>
                <div class="item-form" @click="cliick(1, 6)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>Vistoria de qualidade AGE</span>
                </div>
                <div class="item-form" @click="cliick(1, 7)">
                    <i class="fi fi-rr-home-location-alt"></i>
                    <span>Vistoria de qualidade WT</span>
                </div>
            </div>
        </div>
        <div class="form-modal" v-if="this.form.modal === true">
            <div class="fill-form shadow-standard">
                <div style="width: 100%; display: flex; flex-direction: row-reverse">
                    <i class="fi fi-rr-cross" style="font-size: 2rem; color: var(--color-red); cursor: pointer" @click="cliick(0,0)"></i>
                </div>
                <div class="selections-form" v-if="this.form.type_form === 1">
                    <h6>Formulário de Instalação</h6>

                    <form action="#">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Forms",
    props: [],
    methods: {
        cliick(status, type_form) {

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
    beforeMount() {},
    created() {},
    mounted() {}
}
</script>

<style scoped>

</style>
