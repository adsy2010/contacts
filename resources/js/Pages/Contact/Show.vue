<script setup>
let emit = defineEmits([]);
let props = defineProps({contact: Object});

</script>

<template>
    <div>Contact: {{contact.name}}</div>
    <!--    <div></div>-->
    <div>
        Show contact details here
    </div>
</template>
