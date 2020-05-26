<template>

</template>

<script>
import Echo from "laravel-echo"
export default {
    data(){
        return {
            listaturno: [] // o Object
        }
    },
    mounted(){
        console.log('Compenente moument');
        let channel2 = window.Echo.channel('channel-turn');
        channel2.listen('.EventTurn', function(data)
        {
            console.log(data);
        });

    }
}
</script>

<style>

</style>

