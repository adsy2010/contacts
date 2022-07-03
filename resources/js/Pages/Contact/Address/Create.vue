<script setup>
import Form from "./Partials/Form";

let emit = defineEmits([]);
let props = defineProps({
    address: Object,
    contact: Object,
});

</script>

<template>
    <div class="mx-auto lg:max-w-7xl">
        <div class="py-6">
            <Form
                :address="address"
                :contact="contact"
                street1
                street2
                street3
                city
                county
                country
                postcode
            />
        </div>
    </div>
</template>
