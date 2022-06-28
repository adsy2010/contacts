<script setup>
let emit = defineEmits([]);
let props = defineProps({
    contacts: Object,
    can: Object,
    filters: Object
});

</script>

<template>
    <div>Contacts</div>
    <div><Link href="/contact/create">Create contact</Link></div>
    <div>
        <div v-for="contact in contacts.data">
            {{contact}}
        </div>
    </div>
</template>
