<script setup>
import PersonalInformation from "./PersonalInformation";
import NotificationPreferences from "./NotificationPreferences";
import Profile from "./Profile";
import Divider from "../../Shared/Divider";

let emit = defineEmits([]);
let props = defineProps({
    personalInformation: Boolean,
    notificationPreferences: Boolean,
    profile: Boolean,
    contact: Object
});

</script>

<template>
    <div>
        <Profile v-if="profile" :contact="contact"></Profile>

        <!-- divider -->
        <Divider v-if="profile && (personalInformation || notificationPreferences)"/>

        <PersonalInformation v-if="personalInformation" :contact="contact"></PersonalInformation>

        <!-- divider -->
        <Divider v-if="(profile || personalInformation) && notificationPreferences" />

        <NotificationPreferences v-if="notificationPreferences" :contact="contact"></NotificationPreferences>
    </div>
</template>
