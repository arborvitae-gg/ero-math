// resources/js/dashboard.js
import api from './axios';

export const loadQuestions = async () => {
    try {
        const response = await api.get('/questions');
        return response.data;
    } catch (error) {
        console.error('Failed to load questions:', error);
        return [];
    }
};
