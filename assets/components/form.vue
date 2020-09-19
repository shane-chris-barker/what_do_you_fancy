<template>
    <div>
        <span class="base-timer__label">
            <food-type/>
            <postcode-type  />
            <in-or-out/>
            <br>
            <button type="submit" class="btn btn-primary col-4 offset-4">
                Feed me!
            </button>

        </span>
    </div>
</template>

<script>
    // import Sidebar from '@/components/sidebar';
    // import Timer from '@/components/timer';
    // import Count from "@/components/count";
    import FoodType from '../components/foodType'
    import PostcodeType from '../components/postcodeType'
    import InOrOut from '../components/inOrOut'
    export default {
        name: 'Form',
        components : {
            FoodType,
            PostcodeType,
            InOrOut
        }
    }

</script>