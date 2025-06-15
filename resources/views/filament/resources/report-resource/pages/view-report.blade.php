@extends('filament-panels::page')

@section('content')
    <div class="space-y-6">
        <!-- Status Banner -->
        @if($this->record->status === 'resolved')
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-800 font-medium">This report has been resolved</span>
                </div>
            </div>
        @elseif($this->record->status === 'in_progress')
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-3 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-blue-800 font-medium">This report is currently being processed</span>
                </div>
            </div>
        @elseif($this->record->status === 'pending')
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-yellow-800 font-medium">This report is awaiting review</span>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            {{ $this->infolist }}
        </div>
    </div>

    <style>
        /* Custom styling for professional look */
        .fi-section-header-heading {
            font-size: 1.125rem !important;
            font-weight: 600 !important;
            color: #374151 !important;
        }
        
        .fi-section-header-description {
            color: #6b7280 !important;
            font-size: 0.875rem !important;
        }
        
        .fi-section-content {
            padding: 1.5rem !important;
        }
        
        .fi-in-entry-wrp {
            margin-bottom: 1rem !important;
        }
        
        .fi-in-text-label {
            font-weight: 500 !important;
            color: #374151 !important;
            margin-bottom: 0.25rem !important;
        }
        
        .fi-in-text-content {
            color: #1f2937 !important;
        }
        
        .fi-badge {
            font-weight: 500 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.025em !important;
        }
        
        /* Status specific styling */
        .fi-section {
            border: 1px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
            margin-bottom: 1.5rem !important;
            background: #ffffff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1) !important;
        }
        
        .fi-section-header {
            background: #f9fafb !important;
            border-bottom: 1px solid #e5e7eb !important;
            padding: 1rem 1.5rem !important;
        }
        
        /* Prose styling for description */
        .prose {
            max-width: none !important;
            line-height: 1.7 !important;
            color: #374151 !important;
        }
        
        .prose p {
            margin-bottom: 1rem !important;
        }
        
        /* Icon styling */
        .fi-section-header-icon {
            color: #6366f1 !important;
        }
    </style>
@endsection
