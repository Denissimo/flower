<?php

namespace App\Entity;

interface UserRightsInterface
{
    public function getUser(): ?User;

    public function setUser(?User $user): self;
}