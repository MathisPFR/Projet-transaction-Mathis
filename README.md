<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Projet de Gestion de Transactions avec Laravel

## Description

Ce projet implémente une API REST pour la gestion des transactions d'utilisateurs, en utilisant Laravel comme framework backend. Il inclut l'authentification, des opérations CRUD sur les transactions, ainsi que la documentation de l'API avec **Swagger (L5 Swagger)**. Les transactions sont liées aux utilisateurs, et une contrainte de suppression en cascade est utilisée pour garantir que les transactions d'un utilisateur sont supprimées lorsque cet utilisateur est supprimé.

## Fonctionnalités

- **CRUD pour les transactions** (ajouter, afficher, modifier, supprimer).
- **Authentification utilisateur** avec Laravel Sanctum.
- **Suppression en cascade** des transactions lors de la suppression d'un utilisateur.
- **Documentation API** avec Swagger (L5 Swagger).
