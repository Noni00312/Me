<?php

namespace App\Enums;

enum ProjectStatus: string
{
  case NOT_STARTED = 'Not Started';
  case IN_PROGRESS = 'In Progress';
  case ON_HOLD = 'On Hold';
  case COMPLETED = 'Completed';
}
