<template>
    <div>
        <div v-show="!introHidden">
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
    </div>
</template>
<script>
    export default {
        name: 'homeText',
        props: {
            introHidden: {
                type:Boolean,
                required: true
            }
        },
    }
</script>