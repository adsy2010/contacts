<script setup>
import Details from "./Partials/Details";

let emit = defineEmits([]);
let props = defineProps({contact: Object});

</script>

<template>
    <div class="mx-auto lg:max-w-7xl">
        <!--    <div></div>-->
        <div class="py-6">
            <Details :contact="contact" personal-information/>
        </div>
    </div>

</template>
