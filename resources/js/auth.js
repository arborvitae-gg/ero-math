import api from './axios';

export const login = async (credentials) => {
    try {
        const response = await api.post('/login', credentials);
        window.location.href = '/dashboard';
    } catch (error) {
        throw error.response.data;
    }
};
