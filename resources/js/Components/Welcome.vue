<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <button class="bg-blue-600 px-4 py-2 rounded-sm m-4 hover:bg-blue-500"
            v-if="$page.props.user.permissions.includes('create roles')">Create Role</button>
        <button class="bg-green-400 px-4 py-2 rounded-sm m-4 hover:bg-green-500"
            v-if="$page.props.user.permissions.includes('create lessons')">Create Lesson</button>
    </div>
</template>
