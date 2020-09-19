<template>
    <div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-12 col-9 offset-2">
                    <div class="row">
                        <img src="build/images/fancy-logo.png" class="col-2 offset-5" />
                        <div class="col-12 text-center">
                            <h1>What do you fancy?</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <home-text :intro-hidden="introHidden"/>
                        </div>
                        <div class="col-4">
                            <Form :form-hidden="formHidden" v-on:do-search="doSearch()"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Form from '../components/Form';
    import HomeText from '../components/homeText'
    export default {
        name: 'Home',
        data() {
            return {
                formHidden: false,
                introHidden: false

            }
        },
        components: {
            Form,
            HomeText
        },
        methods: {
            toggleFormHide() {
                this.formHidden = !this.formHidden
            },
            toggleIntroText() {
                this.introHidden = !this.introHidden
            },
            doSearch() {
                this.toggleFormHide();
                this.toggleIntroText()
            }
        }

    }

</script>