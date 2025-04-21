import axios from 'axios';

const api = axios.create({
    baseURL: '/api/v1',
    withCredentials: true,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

// CSRF handling
api.interceptors.request.use(async config => {
    await axios.get('/api/v1/csrf');
    return config;
});

export default api;
