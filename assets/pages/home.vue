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

                            <h2>
                                The tool for solving the question everyone hates when ordering food or picking somewhere to eat...
                            </h2>
                            <p>
                                We've all been there - You and your significant other have decided that tonight, you will not cook!
                                <br>
                                <br>
                                Awesome! But what comes next can lead to hours of frustration, arguments and disagreements - But no more!
                                <br><br>
                                Just pick the sort of food you fancy (or if you're seriously undecided,
                                let the tool do this too), decide if you're eating in or taking out and then enter your
                                postcode - Boom, decision made! Now go and eat!
                            </p>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">What will you eat?</h5>
                                    <Form />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Form from '../components/Form';
    // import Sidebar from '@/components/sidebar';
    // import Timer from '@/components/timer';
    // import Count from "@/components/count";
    export default {
        name: 'Home',
        components: {
            Form,
            // Timer,
            // Count
        },
        mounted () {
            axios
                .get('/')
                .then(response => (this.info = response))
        }
    }

</script>