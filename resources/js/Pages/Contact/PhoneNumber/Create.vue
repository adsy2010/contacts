<script setup>
import Form from "./Partials/Form";

let emit = defineEmits([]);
let props = defineProps({
    phoneNumber: Object,
    contact: Object,
});

</script>

<template>
    <div class="mx-auto lg:max-w-7xl">
        <div class="py-6">
            <Form
                :phone-number="phoneNumber"
                :contact="contact"
                number
            />
        </div>
    </div>
</template>
