<script setup>
import Form from './Partials/Form/Form';

let emit = defineEmits([]);
let props = defineProps({contact: Object});

</script>

<template>
    <div class="mx-auto lg:max-w-7xl">
        <div class="py-6">
            <Form :contact="contact" personal-information edit/>
        </div>
    </div>
</template>
