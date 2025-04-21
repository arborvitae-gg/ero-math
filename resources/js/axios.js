import axios from 'axios';

const api = axios.create({
    baseURL: '/api',
    withCredentials: true,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

// Auto CSRF handling
api.interceptors.request.use(async (config) => {
    if (!document.cookie.includes('XSRF-TOKEN')) {
        await axios.get('/sanctum/csrf-cookie', {
            baseURL: '/',
            withCredentials: true
        });
    }
    return config;
});

export default api;
