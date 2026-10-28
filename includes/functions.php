<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function formatPrice(float $amount): string
{
    return '₦' . number_format($amount, 2);
}

function renderServiceCard(array $service): string
{
    $slug = (string) ($service['slug'] ?? '');
    $title = (string) ($service['title'] ?? 'Service');
    $description = (string) ($service['description'] ?? '');
    $price = (float) ($service['price'] ?? 0.0);
    $icon = (string) ($service['icon'] ?? '✨');

    $html = '<article class="card service-card">';
    $html .= '<div class="service-icon">' . e($icon) . '</div>';
    $html .= '<h3>' . e($title) . '</h3>';
    $html .= '<p>' . e($description) . '</p>';
    $html .= '<div class="service-meta">';
    $html .= '<span class="price">' . e(formatPrice($price)) . '</span>';
    $html .= '<a href="service.php?slug=' . e($slug) . '" class="button-secondary small">View details</a>';
    $html .= '</div>';
    $html .= '</article>';

    return $html;
}
