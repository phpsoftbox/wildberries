<?php

declare(strict_types=1);

namespace PhpSoftBox\Wildberries\Api;

use PhpSoftBox\Wildberries\WildberriesApiResponse;

final class CommunicationsApi extends WildberriesApiSection
{
    /**
     * Непросмотренные отзывы и вопросы
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function newFeedbacksQuestions(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/new-feedbacks-questions', $query);
    }

    /**
     * Неотвеченные вопросы
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function questionsCountUnanswered(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/questions/count-unanswered', $query);
    }

    /**
     * Количество вопросов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function questionsCount(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/questions/count', $query);
    }

    /**
     * Список вопросов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function questionsGet(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/questions', $query);
    }

    /**
     * Работа с вопросами
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function questionsPatch(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->patch('/api/v1/questions', $payload, $query);
    }

    /**
     * Получить вопрос по ID
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function question(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/question', $query);
    }

    /**
     * Необработанные отзывы
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksCountUnanswered(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/feedbacks/count-unanswered', $query);
    }

    /**
     * Количество отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksCount(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/feedbacks/count', $query);
    }

    /**
     * Список отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacks(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/feedbacks', $query);
    }

    /**
     * Ответить на отзыв
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksAnswerPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->post('/api/v1/feedbacks/answer', $payload, $query);
    }

    /**
     * Отредактировать ответ на отзыв
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksAnswerPatch(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->patch('/api/v1/feedbacks/answer', $payload, $query);
    }

    /**
     * Возврат товара по ID отзыва
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksOrderReturn(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->post('/api/v1/feedbacks/order/return', $payload, $query);
    }

    /**
     * Получить отзыв по ID
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedback(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/feedback', $query);
    }

    /**
     * Список архивных отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksArchive(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/v1/feedbacks/archive', $query);
    }

    /**
     * Список закреплённых и откреплённых отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksPinsGet(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/feedbacks/v1/pins', $query);
    }

    /**
     * Закрепить отзывы
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksPinsPost(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->post('/api/feedbacks/v1/pins', $payload, $query);
    }

    /**
     * Открепить отзывы
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksPinsDelete(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->delete('/api/feedbacks/v1/pins', $payload, $query);
    }

    /**
     * Количество закреплённых и откреплённых отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksPinsCount(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/feedbacks/v1/pins/count', $query);
    }

    /**
     * Лимиты закреплённых отзывов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function feedbacksPinsLimits(array $query = []): WildberriesApiResponse
    {

        return $this->host('feedbacks')->get('/api/feedbacks/v1/pins/limits', $query);
    }

    /**
     * Список чатов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function sellerChats(array $query = []): WildberriesApiResponse
    {

        return $this->host('buyerChat')->get('/api/v1/seller/chats', $query);
    }

    /**
     * События чатов
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function sellerEvents(array $query = []): WildberriesApiResponse
    {

        return $this->host('buyerChat')->get('/api/v1/seller/events', $query);
    }

    /**
     * Отправить сообщение
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function sellerMessage(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('buyerChat')->post('/api/v1/seller/message', $payload, $query);
    }

    /**
     * Получить файл из сообщения
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function sellerDownloadById(string|int $id, array $query = []): WildberriesApiResponse
    {
        $path = $this->resolvePath('/api/v1/seller/download/{id}', [
            'id' => $id,
        ]);

        return $this->host('buyerChat')->get($path, $query);
    }

    /**
     * Заявки покупателей на возврат
     *
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function claims(array $query = []): WildberriesApiResponse
    {

        return $this->host('returns')->get('/api/v1/claims', $query);
    }

    /**
     * Ответ на заявку покупателя
     *
     * @param array<string, mixed> $payload
     * @param array<string, scalar|array<array-key, scalar|null>|null> $query
     *
     * @return WildberriesApiResponse<string, mixed>
     */
    public function claim(array $payload = [], array $query = []): WildberriesApiResponse
    {

        return $this->host('returns')->patch('/api/v1/claim', $payload, $query);
    }

}
