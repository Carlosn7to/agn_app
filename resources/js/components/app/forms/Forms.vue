<template>
    <div class="container-app" style="padding: 2vh 0vw">
        <div class="container-form">
            <h6>Formulários disponíveis</h6>
            <div class="items-form">
                <div class="item-form" @click="formStep(1, data.id)" v-for="data in this.data" :key="data.id" :id="data.id">
                    <i class="fi fi-rr-form"></i>
                    <span>Formulário de {{ data.name }}</span>
                </div>
            </div>
        </div>
        <div class="form-modal" v-if="this.form.modal === true">
            <div class="fill-form shadow-standard">
                <div style="width: 100%; display: flex; flex-direction: row-reverse">
                    <i class="fi fi-rr-cross" style="font-size: 2rem; color: var(--color-red); cursor: pointer" @click="formStep(0,0)"></i>
                </div>
                <div class="selections-form">
                       <h6>Formulário</h6>
                    <form :action="actions_new" method="POST" name="form" autocomplete="off" id="form">
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
    props: ['actions_new', 'token', 'forms', 'get_forms', 'get_questions'],
    methods: {
        formStep(status, id) {

            if(status === 0) {
                this.form.modal = false
            }

            if(status === 1) {
                this.form.modal = true

                axios
                    .get(this.get_questions+'/'+id)
                    .then((res) => {
                        this.form_data = res.data
                        console.log(res.data)
                    })
                    .catch((error) => {
                        console.log(error)
                    })

            }

        }
    },
    data () {
        return {
            form: {
                modal: false,
            },
            data: {},
            form_data: {}
        }
    },
    components: {},
    computed: {},
    beforeMount() {
    },
    created() {
    },
    mounted() {
        axios
            .get(this.get_forms)
            .then((res) => {
                this.data = res.data
            })
            .catch((error) => {
                console.log(error)
            })
    }
}
</script>

<style scoped>

</style>
