<?php

namespace Utils\Droppable;


trait Droppable
{
    private string $dropedReason = "";
    private bool $droped = false;

     /**
     * =====================================================================
     *          drop(): object
     * =====================================================================
     * 
     * Создает Копию Обхекта ( $Clone ) и устанавливает $Droped = true
     * что бы указать что обхект был удален кроме того сохраняет
     * причину удаления в ( DroppedReason ) и возвращает обновленный клон
     * обеъкта этот метод полезен если нужно сохранить объект с указанием
     * что он больше не используется но по прежнему хранит его состояние
     * 
     * 
     * Summary of GetDropReason
     * @return static
     */

    public function drop(string $reason): static
    {
        $clone = clone $this;
        $clone->droped = true;
        $clone->dropedReason = $reason;
        return $clone;
    }

    /**
     * =====================================================================
     *          wasDropped(): mixed
     * =====================================================================
     * 
     * проверяет бы ли объект удален возврашая текущее значение ( $Dropped )
     * используется что бы проверить состояние объекта пригоден ли он 
     * для использования или был помечен как удаленный
     * 
     * 
     * Summary of GetDropReason
     * @return bool
     */
    public function wasDropped(): bool
    {
        return $this->dropped;
    }


    /**
     * =====================================================================
     *          getDropReason(): string
     * =====================================================================
     * 
     * возвращает строку с причиной по которой объект бы помчене как
     * удаленный ( $DroppedReason ) Это полезно если знать почему
     * объект был отключен от основной функциональности 
     * или исключен от из обработки
     * 
     * Summary of GetDropReason
     * @return string
     */
    public function getDropReason(): string
    {
        return $this->dropedReason;
    }
}